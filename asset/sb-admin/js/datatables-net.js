const table = new DataTable("#example", {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
  columnDefs: [
    {
      searchable: false,
      orderable: false,
      targets: 0,
    },
  ],
  order: [[1, "asc"]],
});

table
  .on("order.dt search.dt", function () {
    let i = 1;

    table
      .cells(null, 0, { search: "applied", order: "applied" })
      .every(function (cell) {
        this.data(i++);
      });
  })
  .draw();

const tableWithNoSetting = new DataTable("#exampleNoSetting", {
  layout: {
    topStart: {
      buttons: [
        "copy",
        "csv",
        "excel",
        {
          extend: "pdfHtml5",
          exportOptions: {
            columns: ":not(:last-child)", // Exclude the last column (Setting)
          },
        },
        {
          extend: "print",
          exportOptions: {
            columns: ":not(:last-child)", // Exclude the last column (Setting)
          },
        },
      ],
    },
  },
  columnDefs: [
    {
      searchable: false,
      orderable: false,
      targets: 0, 
    },
  ],
  order: [[1, "asc"]],
});

tableWithNoSetting
  .on("order.dt search.dt", function () {
    let i = 1;

    tableWithNoSetting
      .cells(null, 0, { search: "applied", order: "applied" })
      .every(function (cell) {
        this.data(i++);
      });
  })
  .draw();
