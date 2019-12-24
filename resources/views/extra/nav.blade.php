<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('index') }}">Jordanian Sudanese College</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link {{ Request::is('/') ? "active" : "" }}" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link {{ Request::is('result') ? "active" : "" }}" href="{{ route('result') }}">Result Enquiry</a>
            <a class="nav-item nav-link {{ Request::is('final') ? "active" : "" }}" href="{{ route('final') }}">Final Result</a>
            <a class="nav-item nav-link {{ Request::is('entry') ? "active" : "" }}" href="{{ route('entry') }}">Management</a>
            <a class="nav-item nav-link {{ Request::is('admin') ? "active" : "" }}" href="{{ route('admin') }}">Admin Panel</a>
          </div>
        </div>
      </nav>
