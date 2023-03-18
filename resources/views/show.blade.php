<x-layout>

    
  <nav class="navbar navbar-expand-lg ">
    <div class="container">
      <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" 
            data-bs-target="#main" 
            aria-controls="main"
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#">Food Ordering System</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-2 p-lg-3" href="#">Sales</a>
              </li>
           
            </ul>
            <div class="search ms-auto px-3 d-none d-lg-block">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            {{-- relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 --}}
            <div class=" px-3 d-none d-lg-block">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm  text-white rounded-pill main-btn  ">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm rounded-pill main-btn   ">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm rounded-pill main-btn  ">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
    
                
            </div>
        
          </div>
        </div>
    </div>
  </nav>
  
<!-- header -->

  @include('header')


    
    <div class=" mt-15">
      <div class="container">

          <div class="">
            <ul class="nav nav-tabs mb-3 " id="myTab" role="tablist">
              <li class="nav-item " role="presentation">
                <button class="nav-link active" id="breakfast-tab" data-bs-toggle="tab" data-bs-target="#breakfast-tab-pane" type="button" role="tab" aria-controls="breakfast-tab-pane" aria-selected="true">Breakfast</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#lunch-tab-pane" type="button" role="tab" aria-controls="lunch-tab-pane" aria-selected="false">Lunch</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#dinner-tab-pane" type="button" role="tab" aria-controls="dinner-tab-pane" aria-selected="false">Dinner</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="beverages-tab" data-bs-toggle="tab" data-bs-target="#beverages-tab-pane" type="button" role="tab" aria-controls="beverages-tab-pane" aria-selected="false" >Beverages</button>
              </li>
            </ul>
            <div class="tab-content " id="myTabContent">
              <div class="tab-pane fade show active  my-4 " id="breakfast-tab-pane" role="tabpanel" aria-labelledby="breakfast-tab" tabindex="0">
                
                <div class="row ">
                  
                 
                   
                
                  <x-breakfast-card :breakfast="$breakfast"  />
                  
                  
                </div>    
              </div>
              <div class="tab-pane fade  my-4 " id="lunch-tab-pane" role="tabpanel" aria-labelledby="lunch-tab" tabindex="0">
                <div class="row">
                  <x-lunch-card :lunchs="$lunchs" />
                </div>    

              </div>
              <div class="tab-pane fade  my-4" id="dinner-tab-pane" role="tabpanel" aria-labelledby="dinner-tab" tabindex="0">
                <div class="row">
                  
                  <x-dinner-card :dinners="$dinners" />
                 
                </div>    
              </div>
              <div class="tab-pane fade d-flex my-4" id="beverages-tab-pane" role="tabplunchanel" aria-labelledby="beverages-tab" tabindex="0">
                <div class="row">
                  <x-beverages-card :beverages="$beverages" />
                
                </div>    
              </div>
            </div>
          </div>
    
      </div>
    </div>
  
</x-layout>