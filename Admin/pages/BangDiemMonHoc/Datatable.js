$(document).ready(function () {
  // LOAD DATA
  $("#NamHoc").change(function () {
    $("#tbDs").empty();
    var namHoc = $(this).val();

    $.post(
      "../../../Admin/pages/BangDiemMonHoc/LoadData.php",
      {
        namHoc: namHoc,
      },
      function (data, status) {
        if (status == "success") {
          $("#myTable").html(data);
        }
      }
    );
  });

  // SORT FUNCTION
  let sortOrder = "asc";

  function sortTable(columnIndex, order) {
    let rows = $("#myTable tr").get();
    rows.sort(function (a, b) {
      let A = $(a).children("td").eq(columnIndex).text().toLowerCase();
      let B = $(b).children("td").eq(columnIndex).text().toLowerCase();
      if ($.isNumeric(A) && $.isNumeric(B)) {
        A = parseInt(A);
        B = parseInt(B);
      }
      if (order === "asc") {
        return A > B ? 1 : A < B ? -1 : 0;
      } else {
        return A < B ? 1 : A > B ? -1 : 0;
      }
    });
    $.each(rows, function (index, row) {
      $("#myTable").append(row);
    });
  }

  $(".sortable").click(function () {
    let columnIndex = $(this).index();
    if (sortOrder === "asc") {
      sortTable(columnIndex, "asc");
      sortOrder = "desc";
      $(this).find(".bxs-up-arrow").addClass("active");
      $(this).find(".bxs-down-arrow").removeClass("active");
    } else {
      sortTable(columnIndex, "desc");
      sortOrder = "asc";
      $(this).find(".bxs-up-arrow").removeClass("active");
      $(this).find(".bxs-down-arrow").addClass("active");
    }
  });

  // SEARCH FUNCTION
  $("#tableSearch").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  // SELECT FUNCTION
  $("#myTable").on("click", "tr", function (event) {
    if (
      !$(event.target).closest("button").length &&
      !$(event.target).closest("a").length &&
      !$(event.target).is(":checkbox")
    ) {
      var checkbox = $(this).find('input[name="btSelectItem"]');
      checkbox.prop("checked", !checkbox.prop("checked"));
      $(this).toggleClass("Checkhighlight", checkbox.prop("checked"));
    }
  });

  $('input[name="btSelectItem"]').change(function () {
    var isChecked = $(this).prop("checked");
    if (isChecked) {
      $(this).closest("tr").addClass("Checkhighlight");
    } else {
      $(this).closest("tr").removeClass("Checkhighlight");
    }
  });

  $('input[name="btSelectAll"]').change(function () {
    var isChecked = $(this).prop("checked");
    $('input[name="btSelectItem"]').prop("checked", isChecked);
    if (isChecked) {
      $("#myTable tr").addClass("Checkhighlight");
    } else {
      $("#myTable tr").removeClass("Checkhighlight");
    }
  });

  //   HOVER FUNCTION
  $(".datatable tbody tr").hover(
    function () {
      $(this).addClass("hover-highlight");
    },
    function () {
      $(this).removeClass("hover-highlight");
    }
  );
});
