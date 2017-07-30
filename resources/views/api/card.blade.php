<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <!-- <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet"> -->
  </head>
  <body>
    <div class="page-content" style="overflow: hidden;">
        <div class="row">
          <div class="col-md-12">
            <div class="content-box-large">
              <div class="panel-body">
                <div class="col-sm-6">
                    <img src="{{ $url }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/en/a/aa/Magic_the_gathering-card_back.jpg'" width="70%">
                  </object>
                  <img src="" >
                </div>
                <div class="col-sm-6 well">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Card Title</td>
                        <td>{{$card[0]['name']}}</td>
                      </tr>
                      <tr>
                        <td>CMC</td>
                        <td>{{$card[0]['cmc']}}</td>
                      </tr>
                      <tr>
                        <td>Mana Cost</td>
                        <td>{{$card[0]['manacost']}}</td>
                      </tr>
                      <tr>
                        <td>Type</td>
                        <td>{{json_decode($card[0]['type'])}}</td>
                      </tr>
                      <tr>
                        <td>Rarity</td>
                        <td>{{$card[0]['rarity']}}</td>
                      </tr>
                      <tr>
                        <td>Sets</td>
                        <td>{{$card[0]['sets']}}</td>
                      </tr>
                      <tr>
                        <td>Card Text</td>
                        <td>{{json_decode($desc[0]['text'])}}</td>
                      </tr>
                      <tr>
                        <td>Flavor Texr</td>
                        <td>{{$desc[0]['flavor']}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
  </body>
</html>