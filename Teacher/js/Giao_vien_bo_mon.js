// select Năm học - Niên khóa - Lớp - Khối
function selectNienKhoa() {
    document.getElementById("HocKy").removeAttribute("disabled");
    resetSelect("HocKy");
  }

  function selectHocKy() {
    document.getElementById("Khoi").removeAttribute("disabled");
    resetSelect("Khoi");
  }

  function selectKhoi() {
    document.getElementById("Lop").removeAttribute("disabled");
    resetSelect("Lop");
  }

  function resetSelect(id) {
    var select = document.getElementById(id);
    var options = select.options;
    for (var i = 0; i < options.length; i++) {
      options[i].selected = options[i].defaultSelected;
    }
  }

// datatable


