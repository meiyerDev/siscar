<html>
<head>
  <title>Carnet</title>
  <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
  <style>
    /* Sticky Footer Classes */
    html,
    body {
      height: 100%;
    }
    #page-content {
      flex: 1 0 auto;
    }
    #sticky-footer {
      flex-shrink: none;
    }

    /* Other Classes for Page Styling */
    body {
      background: #007bff;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }
  </style>
</head>
<body class="d-flex flex-column">
  <div id="page-content">
    <div class="container text-center mt-5">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <form action="{{ route('send.license') }}" method="POST" name="solicitarCarnet">
            @csrf
            <h2 class="font-weight-light mt-4 text-white">Solicitud de Carnet Estudiantil</h2>
            
            <input type="text" name="identity" id="identidad" class="form-control mt-3" placeholder="Ingresa tu Numero de Cédula">
            <button type="submit" id="boton" class="btn btn-danger col-12 mt-2 shadow">Enviar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; Loriana Machado</small>
    </div>
  </footer>

</body>

<!-- JQuery -->
<script type="text/javascript" src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('asset/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script>
  $(document).ready(()=>{
    $('form').submit(e=>{
      e.preventDefault();
      
      let form = $('form[name=solicitarCarnet]');
      
      $.ajax({
        url:form.attr('action'),
        method:'POST',
        data:form.serialize(),
        beforeSend:()=>{
          $('#boton').attr('disabled', true);
        },
        success:(data)=>{
          Swal.fire({
            title: "Felicidades!",
            text: "TU CARNET HA SIDO ENVIADO CON ÉXITO A TU CORREO REGISTRADO!",
          });
        },
        error:(err)=>{
          Swal.fire({
            type: 'error',
            title: 'Oops..',
            text: 'Algo ha salido mal, Vuelve a intentarlo mas tarde.'
          });
        },
        complete: ()=>{
          $('#boton').removeAttr('disabled');
        }
      })
    })
  })
</script>
</html>
