<div class="create-inquiry">
  <a href="{{ url('/inquiries/create') }}"><img src="/images/create1.png" alt="Create icon">Create an inquiry</a>
</div>
<div class="create-contribution">
  <a href="{{ url('/contributions/create') }}"><img src="/images/create1.png" alt="Create icon">Create a contribution</a>
</div> 
  <div class="container">
    <div class="search">
      <div id="search-box">
        <form method="POST" action="{{ route('search') }}">
      	{{ csrf_field() }}
      	<select id="searchselect" name="type" required>
      	  <option value="">Type</option>
		      <option value="inquiries">Inquiries</option>
		      <option value="contributions">Contributions</option>
		    </select>
        <input id="search-bar" type="text" name="search" placeholder="Search" required>
        <button id="search-button" type="submit"><i class="material-icons">search</i></button>
      </form>
    </div>
  </div>

<!-- div end of container is included in pages-->