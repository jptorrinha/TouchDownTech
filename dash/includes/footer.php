<footer>
  <div class="container text-center">
    <small class="copyright"><i class="far fa-copyright"></i> <?php echo date("Y"); ?>. First Tech. All rights
      reserved.</small>
  </div>
  <!--//container-->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript"
  src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-print-2.2.3/cr-1.5.6/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js">
</script>

<script src="js/script.js"></script>
<?php if($curPageName === "novo.php" || $curPageName === "editar.php"): ?>
  <script src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.min.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script src="js/adicionar.js"></script>
<?php endif; ?>
</body>

</html>