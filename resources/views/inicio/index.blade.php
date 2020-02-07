@extends('layouts.main')

@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Campeonato Altinão</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#download">Tabela</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Jogos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Escalação</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#cta">Galeria</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ URL::to('login') }}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="container h-100" id="app">
        <div class="row h-100">
          <div class="col-sm-12 col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Campeonato Altinão 2017/2018</h1>
              <a href="http://localhost/altinao_2019/download/altinao_app.apk" class="btn btn-outline btn-xl js-scroll-trigger">Baixe o Aplicativo</a>
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="http://172.17.192.161:8000/images/estadio.png" style="" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-5 mx-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="http://172.17.192.161:8000/images/taca.png" style="" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-7 my-auto">

            <table class="table table-dark">
              <thead>
              <tr><th colspan="6">Tabela 2017 - 2018</th></tr>
              <tr>
                <th>Time</th>
                <th>V</th>
                <th>GP</th>
                <th>GC</th>
                <th>S</th>
                <th>P</th>
              </tr>
              </thead>
              <tbody>

              @foreach($table as $times)
                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr>
                  <td>{{$times->sigla}}</td>
                  <td>{{$times->vitorias}}</td>
                  <td>{{$times->gols_pro}}</td>
                  <td>{{$times->gols_con}}</td>
                  <td>{{$times->saldo}}</td>
                  <td>{{$times->pontos}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">

        <div class="row">
          <div style="margin-left: 5px" class="col-lg-6 col-12 mx-auto">

            <table class="table table-dark">
              <thead>
              <tr class="ali_centro"><th colspan="6">Jogos</th></tr>
              <tr>
                <th>Data</th>
                <th class="ali_direita"></th>
                <th class="ali_direita"></th>
                <th class="ali_centro">Placar</th>
                <th class="ali_esquerda"></th>
                <th class="ali_esquerda"></th>
              </tr>
              </thead>
              <tbody>

              @foreach($games as $game)
                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr class="button" data-toggle="modal" data-target="#exampleModal-{{$game->id}}">
                  <td>{{$game->data}}</td>
                  <td class="ali_direita">{{$team = App\Team::find($game->teams_casa)->sigla}}</td>
                  <td class="ali_direita">{{$game->placar_casa}}</td>
                  <td class="ali_centro">x</td>
                  <td class="ali_esquerda">{{$game->placar_visitante}}</td>
                  <td class="ali_esquerda">{{$team = App\Team::find($game->teams_visitante)->sigla}}</td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gols do Jogo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        @foreach($golsdojogo as $quantidade)
                          @if($game->id == $quantidade->games_id)
                            <p class="ali_esquerda">{{$nomedojogador = \App\Player::find($quantidade->players_id)->nome}}: {{$quantidade->quantidade}} gol(s).</p>
                          @endif
                        @endforeach
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->

              @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-lg-3 col-12 mx-auto">

            <table class="table table-dark">
              <thead>
              <tr><th class="ali_centro" colspan="6">Artilheiro</th></tr>
              <tr>
                <th></th>
                <th></th>
                <th>Nome</th>
                <th>Gol(s)</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              {{--@php--}}
              {{--$date=date('Y-m-d', $team['date']);--}}
              {{--@endphp--}}
              @foreach($gols as $gol)
                <tr>
                  <td></td>
                  <td></td>
                  <td>{{$nome = \App\Player::find($gol->players_id)->nome}}</td>
                  <td class="ali_direita">{{$gol->gols}}</td>
                  <td></td>
                  <td></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <section class="cta" id="contact">
      <div class="cta-content">
        <div class="container">
          <div class="section-heading text-center">
            <h2 class="branco-titulo">Escalações</h2>
            <hr>
          </div>
          <div class="row">
            @foreach($teams as $team)
              <div class="col-lg-2 col-4">
                <h3 class="text-center" style="color: white"><b>{{$team->nome}}</b></h3>
                <hr>
                <div class="thumbnail">
                  <img class="imagem" src="http://{{$team->logo}}" alt="{{$team->sigla}}">
                  <div class="caption">

                    @foreach($players as $player)
                      @if($player->teams_id == $team->id)
                        <p>{{$player->nome}}</p>
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>


    </section>

    <section class="contact bg-primary" id="cta">
      <div class="container">
        <div class="section-heading text-center">
          <h2 class="branco-titulo">Galeria</h2>
          <hr>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="http://172.17.192.161:8000/images/barsemlona.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <div class="imagem2"></div>
              <img class="d-block w-100" src="http://172.17.192.161:8000/images/pecomchule.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <div class="imagem3"></div>
              <img class="d-block w-100" src="http://172.17.192.161:8000/images/laranjada.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>Developed by SnakeWar</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <br>
            <a href="#"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
                <input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
              </form>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#"></a>
          </li>
          <li class="list-inline-item">
            <a href="#"></a>
          </li>
        </ul>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/new-age.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

  @endsection
