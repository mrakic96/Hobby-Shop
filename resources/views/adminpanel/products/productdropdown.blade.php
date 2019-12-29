<style>
.dropdown1 {
  position: relative;
  display: inline-block;
  top:95;
  left:700;
}

.dropdown-content1 {
  display: none;
  position:absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content1 a:hover {background-color: #fff;}

.dropdown1:hover .dropdown-content1 {display: block;}

.dropdown1:hover .dropbtn1 {background-color: #218491;}
</style>
<div class="dropdown1">
  <button class="btn btn-primary float-lg-left">Proizvodi</button>
  <div class="dropdown-content1">
    <a href="#">Platna</a>
    <a href="#">Kistovi</a>
    <a href="#">Olovke</a>
  </div>
</div>