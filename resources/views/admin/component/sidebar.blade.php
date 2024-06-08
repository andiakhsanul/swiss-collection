<!-- Sidebar -->
<div class="sidebar" id="mySidebar" style="background-color:#ED563B ;">
    <div class="side-header">
        <img src="{{ asset('/images/logo.png') }}" width="120" height="120" alt="Swiss Collection">
        <h5 style="margin-top:10px;">Hello, Admin</h5>
    </div>

    <hr style="border:1px solid; background-color:#ED563B; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="/admin"><i class="fa fa-home"></i> Dashboard</a>
    <a href="{{ route('user') }}"><i class="fa fa-users"></i> Users</a>
    <a href="{{ route('recipe') }}"><i class="fa fa-cutlery"></i> Recipe</a>
    <a href="{{ route('video') }}" ><i class="fa fa-video-camera"></i> Video</a>
    <a href="{{ route('program') }}"><i class="fa fa-th"></i> Program</a>
    <a href="{{ route('admin.favorites.index') }}"><i class="fa fa-heart"></i> favorit</a>
    <a href="{{ route('logout') }}"><i class="fa fa-caret-square-o-left"></i> Logout</a>


    <!---->
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("main-content").style.marginLeft = "250px";
        document.getElementById("main").style.display = "none";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("main").style.display = "block";
    }
</script>
