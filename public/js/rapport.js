var url = null
$('#rapport').change(function (e) {
  e.preventDefault();
  var rapport = $('#rapport').val();
  url = window.location.href + '/' + rapport;
});

$('#rapportForm').submit(function (e) {
  e.preventDefault();
  var post = {
    type: $('#type').val(),
    date: $('#date').val(),
  }
  generateExcelFile(url, post)
});

function generateExcelFile(url, post) {
  let data = null;
  $.ajax({
    type: "POST",
    url: url,
    data: post,
    dataType: "JSON",
    success: function (response) {
      data = response
      // Créer un nouveau classeur
      var workbook = XLSX.utils.book_new();
      // Convertir les données JSON en une feuille de calcul
      var worksheet = XLSX.utils.json_to_sheet(data.data);
      // Ajouter la feuille de calcul au classeur
      XLSX.utils.book_append_sheet(workbook, worksheet, "Feuille1");
      // Générer le binaire du fichier Excel
      var excelBinary = XLSX.write(workbook, { type: "binary", bookType: "xlsx" });
      // Convertir le binaire en tableau de bytes
      var excelBytes = new Uint8Array(excelBinary.length);
      for (var i = 0; i < excelBinary.length; i++) {
        excelBytes[i] = excelBinary.charCodeAt(i) & 0xff;
      }
      // Créer un objet Blob avec le tableau de bytes
      var blob = new Blob([excelBytes], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
      // Créer un lien de téléchargement
      var link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = data.filename;
      // Simuler un clic sur le lien pour démarrer le téléchargement
      link.click();
    },
    error: function (xhr, status, error) {
      alert('Error: ' + status + '\n' + error);
    }
  });
}
