
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('tem_plate/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('tem_plate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('tem_plate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->

<script src="{{ asset('tem_plate/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('tem_plate/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('tem_plate/assets/js/script.js')}}"></script>


<!-- Custom scripts for all pages-->
<script src="{{ asset('tem_plate/js/sb-admin.min.js')}}"></script>
<script src="{{ asset('tem_plate/js/awesomechart.js')}}"></script>




<script src="{{ asset('tem_plate/js/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('tem_plate/js/data-table/datatables-init.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>






<!-- Demo scripts for this page-->
<script src="{{ asset('tem_plate/js/demo/datatables-demo.js')}}"></script>
<script src="{{ asset('tem_plate/js/demo/chart-area-demo.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script type="application/javascript">
    $(document).ready(function () {

        $('#prntPSS').click(function() {
            var printContents = $('#mainFrame').html();
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });

    });
</script>
<script>
    CKEDITOR.replace('application',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>



