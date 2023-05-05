function paginateTable(tableId, rowsPerPage) {
  var table = $("#" + tableId);
  var rows = table.find("tbody tr");
  var pageCount = Math.ceil(rows.length / rowsPerPage);

  var pagination = $("<ul>").addClass("pagination");

  for (var i = 0; i < pageCount; i++) {
    $("<li>").addClass("page-item").append(
      $("<a>").addClass("page-link").attr("href", "#").text(i + 1)
    ).appendTo(pagination);
  }

  pagination.insertBefore(table);

  table.find("tbody tr").hide();
  table.find("tbody tr").slice(0, rowsPerPage).show();

  pagination.find("li:first-child").addClass("active");

  pagination.find("li.page-item").on("click", function() {
    var pageNum = $(this).find("a").text();
    var startIndex = (pageNum - 1) * rowsPerPage;
    var endIndex = startIndex + rowsPerPage;
    table.find("tbody tr").hide();
    table.find("tbody tr").slice(startIndex, endIndex).show();
    pagination.find("li").removeClass("active");
    $(this).addClass("active");
  });
}

function searchTable(tableId, searchId) {
  // Récupérer la valeur de l'input de recherche
  var searchText = $('#' + searchId).val().toLowerCase();
  // console.log($('#' + searchId).val());

  // Parcourir toutes les lignes du tableau
  $('#' + tableId + ' tbody tr').each(function(index, row) {
    var allCells = $(row).find('td');
    var found = false;
    
    // Parcourir toutes les cellules de la ligne
    allCells.each(function(index, td) {
      var regExp = new RegExp(searchText, 'gi');
      if ($(td).text().match(regExp)) {
        found = true;
        return false; // Sortir de la boucle each
      }
    });
    
    // Afficher ou masquer la ligne en fonction de si on a trouvé un résultat
    if (found == true) {
      $(row).fadeIn();
    } else {
      $(row).fadeOut();
    }
  });
}

function paginateTable(tableId, rowsPerPage) {
  var table = $("#" + tableId);
  var rows = table.find("tbody tr");
  var pageCount = Math.ceil(rows.length / rowsPerPage);

  var pagination = $("<ul>").addClass("pagination m-auto slidy");

  for (var i = 0; i < pageCount; i++) {
    $("<li>").addClass("page-item").append(
      $("<a>").addClass("page-link").attr("href", "#"+tableId).text(i + 1)
    ).appendTo(pagination);
  }

  pagination.insertAfter('#footer');

  table.find("tbody tr").hide();
  table.find("tbody tr").slice(0, rowsPerPage).show();

  pagination.find("li:first-child").addClass("active");

  pagination.find("li.page-item").on("click", function() {
    var pageNum = $(this).find("a").text();
    var startIndex = (pageNum - 1) * rowsPerPage;
    var endIndex = startIndex + rowsPerPage;
    table.find("tbody tr").hide();
    table.find("tbody tr").slice(startIndex, endIndex).show();
    pagination.find("li").removeClass("active");
    $(this).addClass("active");
  });
}







