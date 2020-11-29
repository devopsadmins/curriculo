<html>
    <head>
        <title>title</title>
        <link rel="stylesheet"  href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <link rel="stylesheet"  href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <link rel="stylesheet"  href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>

    </head>
    <body>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>ZIP / Post code</th>
                    <th>Country</th>
                </tr>
            </thead>
        </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript">
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"/>
            <script src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js" type="text/javascript"/>
            <script src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js" type="text/javascript"/>
                <script>
                    $(document).ready(function() {
                             $('#example').DataTable({
                    ajax:           "dados.php",
                            deferRender:    true,
                            scrollY:        200,
                            scrollCollapse: true,
                            scroller:       true
   });
        } );
        </script>
            </body>
        </html>

