<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

       

       
        <link rel="stylesheet" href="{{url('css/style.css')}}" />
        <link rel="stylesheet" href="{{url('css/sidebar.component.css')}}" />
        <link rel="stylesheet" href="{{url('css/widget.css')}}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
    
       
    </head>
<body >
    <div class=" d-flex align-items-stretch" style="height: 100vh;">
            <nav id="sidebar">
              
              
        <ul class="list-unstyled components mb-5">
          
          <li>
            <a href="{{url('admin/employees')}}" ><span class="fa-solid fa-user mr-3"></span>Employees</a>
          </li>
          <li>
            <a href="{{url('admin/companies')}}" ><span class="fa-solid fa-building mr-3"></span>Companies</a>
          </li>
         
          <li >
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
                          this.closest('form').submit();"><span class="fa-solid fa-sign-out mr-3"></span>{{ __('Log Out') }}
            </x-responsive-nav-link>
          </form>
          </li>
       
        </ul>
    
        </nav>
        @yield('admin_panel_content')
    </div>
        