<style>
.h6{
font-size:70px;}
.sidenav {
  height: 50%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 150;
  left: 15;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: black;
  display: block;
}

.sidenav a:hover {
  color: grey;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div class="sidenav">
  <a href="{{ url('/products') }}"><font size="5">Proizvodi</a></font>
  <a href="{{ url('/olovke') }}">Olovke</a>
  <a href="{{ url('/kistovi') }}">Kistovi</a>
  <a href="{{ url('/platna') }}">Platna</a>
</div>