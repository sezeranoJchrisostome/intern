

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright ©  2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div> 

</div>

</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  <script src="str/vendor/jquery/jquery.min.js"></script>
  <script src="str/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="str/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="str/js/sb-admin-2.min.js"></script>


<script src="datatable/js/jquery.dataTables.min.js" ></script>
<script src="datatable/js/dataTables.buttons.min.js" ></script>
<script src="datatable/js/buttons.flash.min.js"></script>
<!-- for all button means if they miss no appearing -->
<script src="datatable/js/pdfmake.min.js" ></script>
<script src="datatable/js/jszip.min.js" ></script>
<script src="datatable/js/vfs_fonts.js" ></script>
<script src="datatable/js/buttons.html5.min.js"></script>
<script src="datatable/js/buttons.print.min.js" ></script>
<script src="js/ex.js"></script>

<script type="text/javascript">


     
     
$(document).ready(function() {
    $('.table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        exclude:'ex',
        proccesing:true
           } );
} );
    

</script>




</body>

</html>