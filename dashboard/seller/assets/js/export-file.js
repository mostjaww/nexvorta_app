document.getElementById('exportPrint').addEventListener('click', function() {
    window.print();
  });

  document.getElementById('exportCsv').addEventListener('click', function() {
    exportToCsv('data.csv', getData());
  });

  document.getElementById('exportExcel').addEventListener('click', function() {
    exportToExcel('data.xlsx', getData());
  });

  document.getElementById('exportPdf').addEventListener('click', function() {
    exportToPdf('data.pdf', getData());
  });

  document.getElementById('exportCopy').addEventListener('click', function() {
    copyToClipboard(getData());
  });

  function getData() {
    return [
      ['Nama', 'Usia', 'Kota'],
      ['Andi', 25, 'Jakarta'],
      ['Budi', 30, 'Bandung']
    ];
  }

  function exportToCsv(filename, rows) {
    let csvContent = "data:text/csv;charset=utf-8," + rows.map(e => e.join(",")).join("\n");
    let encodedUri = encodeURI(csvContent);
    let link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  function exportToExcel(filename, rows) {
    let ws = XLSX.utils.aoa_to_sheet(rows);
    let wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, filename);
  }

  function exportToPdf(filename, rows) {
    let doc = new jsPDF();
    doc.autoTable({
      head: [rows[0]],
      body: rows.slice(1)
    });
    doc.save(filename);
  }

  function copyToClipboard(rows) {
    let text = rows.map(e => e.join("\t")).join("\n");
    navigator.clipboard.writeText(text).then(() => alert("Data copied to clipboard!"));
  }