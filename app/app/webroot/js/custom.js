$(document).ready(function () {

    $('label[for="UserUsername"]').html('Usuario');

    $('#ConsultTable').DataTable({
        initComplete: function () {
            var api = this.api();
            api.columns().indexes().flatten().each(function (i) {
                var column = api.column(i);
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }

    });

    var table = $('#recordsConsult').DataTable({
        initComplete: function () {
            var api = this.api();

            api.columns().indexes().flatten().each(function (i) {
                var column = api.column(i);
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        },
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $('.totalRows').html("Total de horas: "+pageTotal);
        }

    });

    $('#min, #max').change(function () {
        table.draw();
    });
});

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
        var min = $('#min').val();
        var max = $('#max').val();

        if (typeof min !== 'undefined' || typeof max !== 'undefined') {
            var dates = data[3];
            var d1 = min.split("-");
            var d2 = max.split("-");
            var c = dates.split("/");

            var from = new Date(d1[0], d1[1] - 1, d1[2]);
            var to = new Date(d2[0], d2[1] - 1, d2[2]);
            var check = new Date(c[2], c[1] - 1, c[0]);

            if (check > from && check < to) {
                return true;
            }
            return false;
        }else{
            return true;
        }

    }
);

