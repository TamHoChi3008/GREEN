<header id="header" class="fixed-top ">
    <nav id="navbar1" class="navbar1 fixed-top ">
        <a href="/">Home</a>
        <a href="/">About</a>
        <a href="/order-tracker">Order tracker</a>
        <a href="/">Newletters Signup</a>
        <?php
          $name = Session::get('user_name');
          $id = Session::get('user_id');
          if (isset($name) && isset($id)) {
          ?>
          <a href="/my-account?id={{$id}}">Welcome {{$name}}</a>
          <?php } else {
          ?>
          <a href="/login-account">Login</a>
          <?php } ?>

    </nav>
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Tempo</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="lcontainer d-flex align-items-centerogo"><img src="./frontend/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
          <ul>

            <li class="dropdown"><a href="/Men"><span>Men</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
              @foreach($Men_catalog as $key => $Men)
                <li><a href="/{{Str::slug($Men->catalog_name)}}"><span>{{$Men->catalog_name}}</span> </a>
                </li>
                @endforeach
                <li><a href="/trending"><span>Trending</span> </a> </li>
              </ul>
            </li>
            <li class="dropdown"><a href="/Women"><span>Women</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
              @foreach($Women_catalog as $key => $Women)
                <li><a href="/{{Str::slug($Women->catalog_name)}}"><span>{{$Women->catalog_name}}</span> </a>
                </li>
                @endforeach
                <li><a href="/trending"><span>Trending</span> </a> </li>
              </ul>
            </li>
            <li class="dropdown"><a href="/Kids"><span>Kids</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
              @foreach($Kids_catalog as $key => $Kids)
                <li><a href="/{{Str::slug($Kids->catalog_name)}}"><span>{{$Kids->catalog_name}}</span> </a>
                </li>
                @endforeach
                <li><a href="/trending"><span>Trending</span> </a> </li>
              </ul>
            </li>
            <li class="dropdown"><a href="/Latest"><span>Latest</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/trending"><span>Trending</span> </a> </li>
              </ul>
            </li>        
            <li class="dropdown"><a href="/Brand"><span>Brands</span> <i class="bi bi-chevron-down"></i></a>
              <ul>

                <li class="dropdown"><a href="/Nike"><span>Nike</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                      @foreach($Nike_brand as $key => $Nike)
                      <li><a href="/{{Str::slug($Nike->brand_name)}}"><span>{{$Nike->brand_name}}</span> </a>
                      </li>
                      @endforeach
                  </ul>
                </li>

                <li class="dropdown"><a href="/Converse"><span>Converse</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                      @foreach($Converse_brand as $key => $Converse)
                      <li><a href="/{{Str::slug($Converse->brand_name)}}"><span>{{$Converse->brand_name}}</span> </a>
                      </li>
                      @endforeach
                  </ul>
                </li>
              </ul>
            </li>

            





            

           
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <div class="nav-items">
            <div class="search">
              <form action="/search" method="get">
                <input type="text" name="search" id="" placeholder="Search" required>
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
              </form>
            </div>
      </div>
      
      <div class="nav-1">
        <a href="/view-heart"><i class="far fa-heart"></i></a>
        <a href="/view-cart"><i class="fas fa-shopping-cart"></i></a>
      </div>
    </div>
  </header>