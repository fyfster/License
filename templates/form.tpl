{$header}
{$notification}
<div class="jumbotron" style="padding-top: 0px;">
  <h2>{$formTypeName}</h2>
  <p class="lead">
    Va rog sa descarcati fisierul apasand pe butonul "Descarca document". Dupa ce ati descarcat fisierul 
    completati campurile necesare si salvati documentul. Cand ati finalizat documentul va rog sa il predati 
    apasand pe butonul "Incarca cerere" si selectati cererea completata
  </p><br/>
  <p class="lead">
    Puteti completa informatiile dumneavoastra in cerere descarcand fisiereul <a href="{$xmlPath}" role="button" download>acesta</a> si 
    importand fisierul descarcat in pdf folosind butonul "Import" din pdf
  </p>
  <form class="form" method="post" action="{$formTypeValue}Form.php?action=upload&formTypeId={$formTypeId}" name="submit" enctype="multipart/form-data">
    <p class="text-center">
      <a class="btn btn-lg btn-success" href="{$formPath}" role="button" download>Descarca document</a>
      <a class="btn btn-lg btn-success uploadFake" href="javascript:;" role="button">Incarca document</a>
      <input type="file" id="uploadFile" style="visibility:hidden;" name="uploadedfile">  
      <script>
        $(document).on('click', '.uploadFake', function(event) {
          $('#uploadFile').click();
        });
        $(document).on('change', '#uploadFile', function(event) {
          $('.form').submit();
        });
      </script>
    </p>
  </form>
</div>
{$footer}