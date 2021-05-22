budget = `
<div class="stype dropdown">
    <div class="form-group">
        <select class="form-control" name="budget" >
            <option disabled hidden selected>Budget</option>
            <option>5 Lacs</option>
            <option>10 Lacs</option>
            <option>15 Lacs</option>
            <option>20 Lacs</option>
            <option>25 Lacs</option>
            <option>30 Lacs</option>
            <option>35 Lacs</option>
            <option>40 Lacs</option>
            <option>50 Lacs</option>
            <option>60 Lacs</option>
            <option>75 Lacs</option>
            <option>90 Lacs</option>
            <option>1 Crore</option>
        </select>
    </div>
</div>
`;
bedroom = `
<div class="stype dropdown">
    <div class="form-group">
        <select class="form-control" name="bedr">
            <option disabled hidden selected>Bedroom</option>
            <option>1 RK/1 BHK</option>
            <option>2 BHK</option>
            <option>3 BHK</option>
            <option>4 BHK</option>
        </select>
    </div>
</div>
`;
posted = `
<div class="stype dropdown">
    <a class="btn dropdown-toggle" type="button" data-toggle="dropdown">Posted By</a>
    <ul class="dropdown-menu">
        <li class="dropdown-item"><input type="checkbox" value="0" name="siteType">Owner</li>
        <li class="dropdown-item"><input type="checkbox" value="1" name="siteType">Dealer</li>
        <li class="dropdown-item"><input type="checkbox" value="2" name="siteType">Builder</li>
    </ul>
</div>
`;
area = `
<div class="stype dropdown keep-open">
    <a class="btn dropdown-toggle" type="button" data-toggle="dropdown">Area</a>
    <ul class="dropdown-menu">
        <li style="display:inline-block;" class="dropdown-item"><input id="minarea" class="form-control" autocomplete="off" type="text" placeholder = "Min" onchange="checkNumeric(this)"></li>
        <li style="display:inline-block;" class="dropdown-item"><input id="maxarea" class="form-control" autocomplete="off" type="text" placeholder = "Max" onchange="checkNumeric(this)"></li>
        <li style="display:inline-block;" class="dropdown-item">
            <select class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                <option>sq.ft.</option> <option>sq.yards</option> <option>sq.m.</option> <option>acres</option>
                <option>marla</option> <option>cents</option> <option>bigha</option> <option>kottah</option>
                <option>kanal</option> <option>grounds</option> <option>biswa</option> <option>ares</option>
                <option>guntha</option> <option>aankadam</option> <option>hectares</option> <option>rood</option>
                <option>chataks</option><option>perch</option>
            </select>
        </li>
    </ul>
</div>
`;
ptypeul = `
<ul style="padding: 0px 5px; max-height:250px; width: 280px;" class="customscrolls">
    <li><input type="checkbox" checked name="searchtype"> Ready to move office space</li>
    <li><input type="checkbox" checked name="searchtype"> Bare shell office space</li>
    <li><input type="checkbox" checked name="searchtype"> Co-working office space</li>
    <li><input type="checkbox" checked name="searchtype"> Commercial Shops</li>
    <li><input type="checkbox" checked name="searchtype"> Commercial Showrooms</li>
    <li><input type="checkbox" checked name="searchtype"> Commercial Land/Inst. Land</li>
    <li><input type="checkbox" checked name="searchtype"> Industrial Lands/Plots</li>
    <li><input type="checkbox" checked name="searchtype"> Agricultural/Farm Land</li>
    <li><input type="checkbox" checked name="searchtype"> Hotel/Resorts</li>
    <li><input type="checkbox" checked name="searchtype"> Guest-House/Banquet-Halls</li>
    <li><input type="checkbox" checked name="searchtype"> Space in Retail Mall</li>Ware House
    <li><input type="checkbox" checked name="searchtype"> Ware House</li>
    <li><input type="checkbox" checked name="searchtype"> Cold Storage</li>
    <li><input type="checkbox" checked name="searchtype"> Factory</li>
    <li><input type="checkbox" checked name="searchtype"> Manufacturing</li>
    <li><input type="checkbox" checked name="searchtype"> Other</li>
</ul>
`;
clearbtn = `
<div class="stype dropdown" style="float: right;">
    <input class="btn btn-default" type="reset" value="clear all" >
</div>
`;
btab = `
<div id="searchbar-wraper">
    <div class='searchBox'>
        <div class="ptype dropdown">
            <a class="btn dropdown-toggle" style="width:127px; border-radius: 0px; background-color: #cccccc; height: 37px;" type="button" data-toggle="dropdown">All Residential</a>
            <ul class="dropdown-menu" style="width: 250px;">
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype"> Projects</li>
                <li style="font-weight: 550;"><input type="checkbox" checked name="searchtype"> All Residential</li>
                <ul style="padding: 0px 15px;">
                    <li><input type="checkbox" checked name="searchtype"> Residential Apartment</li>
                    <li><input type="checkbox" checked name="searchtype"> Independent House/Villa</li>
                    <li><input type="checkbox" checked name="searchtype"> Independent/Builder Floor</li>
                    <li><input type="checkbox" checked name="searchtype"> Residential Land</li>
                    <li><input type="checkbox" checked name="searchtype"> Studio Apartment</li>
                    <li><input type="checkbox" checked name="searchtype"> Farm House</li>
                    <li><input type="checkbox" checked name="searchtype"> Serviced Apartments</li>
                    <li><input type="checkbox" checked name="searchtype"> Other</li>
                </ul>
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype"> All Commercial</li>
            </ul>
        </div>
        <div class="ptype querybar">
            <input class="querybox" onclick="showMenu()" name="keyword" onfocus="showMenu()" onfocusout="hideMenu()"
                placeholder="Type Location or Project/Society or Keyword" type="text" autocomplete="off" required="field is required">
        </div>
        <input type="submit" class="btn btn-primary" id="submit_query" value="Search" name="bsearch" style="border-radius: 0px; background-color: #cccccc; height: 37px; "/>
    </div>
    <!--Search Filters Start Here-->
    <div class="filters fade hidden" onclick="this.classList.remove('fade');">
        <div class="stype dropdown">
            <div class="form-group">
                                        <select class="form-control" name="cs" >
                                            <option disabled hidden selected="">Constructio Status</option>
                                            <option>Under Construction</option>
                                            <option>Ready to move</option>
                                          
                                        </select>
                                    </div>
        </div>
        ${budget}
        ${bedroom}
        ${clearbtn}
    </div>
    <!--Search Filters Ends Here-->
</div>      
`;
rtab = `
<div id="searchbar-wraper">
    <div class='searchBox'>
        <div class="ptype dropdown">
            <a class="btn dropdown-toggle" style="width:127px; border-radius: 0px; background-color: #cccccc; height: 37px;" type="button" data-toggle="dropdown">All Residential</a>
            <ul class="dropdown-menu" style="width: 250px;">
                <li style="font-weight: 550;"><input type="checkbox" checked name="searchtype"> All Residential</li>
                <ul style="padding: 0px 15px;">
                    <li><input type="checkbox" checked name="searchtype"> Residential Apartment</li>
                    <li><input type="checkbox" checked name="searchtype"> Independent House/Villa</li>
                    <li><input type="checkbox" checked name="searchtype"> Independent/Builder Floor</li>
                    <li><input type="checkbox" checked name="searchtype"> Studio Apartment</li>
                    <li><input type="checkbox" checked name="searchtype"> Farm House</li>
                    <li><input type="checkbox" checked name="searchtype"> Serviced Apartments</li>
                    <li><input type="checkbox" checked name="searchtype"> Other</li>
                </ul>
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype"> All Commercial</li>
            </ul>
        </div>
        <div class="ptype querybar">
            <input class="querybox" onclick="showMenu()" name="keyword" onfocus="showMenu()" onfocusout="hideMenu()"
                placeholder="Type Location or Project/Society or Keyword" type="text" autocomplete="off" required="field is required">
        </div>
        <input type="submit" class="btn btn-primary" id="submit_query" value="Search" name="rsearch" style="border-radius: 0px; background-color: #cccccc; height: 37px;"/>
    </div>
    <!--Search Filters Start Here-->
    <div class="filters fade hidden" onclick="this.classList.remove('fade');">
        <div class="stype">
            <a class="btn" type="button" href="javascript:void(0)" style="border: 0px;">
            <input type="radio" value="0" name="siteType">Rent &nbsp;
            <input type="radio" value="1" name="siteType">PG
            </a>
        </div>
        ${budget}
        ${bedroom}
        ${clearbtn}
    </div>
    <!--Search Filters Ends Here-->
</div>      
`;
ptab = `
<div id="searchbar-wraper">
    <div class='searchBox'>
        <div class="ptype dropdown">
            <a class="btn dropdown-toggle" style="width:127px; overflow: scroll; border-radius: 0px; background-color: #cccccc; height: 37px;" id="ptab"
                type="button" data-toggle="dropdown">Residential Proj</a>
            <ul class="dropdown-menu" style="width: 250px;">
                <li style="font-weight: 550;"><input type="checkbox" checked name="searchtype"> Residential Projects</li>
                <ul style="padding: 0px 15px;">
                    <li><input type="checkbox" checked name="searchtype"> New Launch</li>
                    <li><input type="checkbox" checked name="searchtype"> Under Construction</li>
                    <li><input type="checkbox" checked name="searchtype"> Ready to Move</li>
                </ul>
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype"> Commercial Projects</li>
            </ul>
        </div>
        <div class="ptype querybar">
            <input class="querybox" onclick="showMenu()" name="keyword" onfocus="showMenu()" onfocusout="hideMenu()"
                placeholder="Type Location or Project/Society or Keyword" type="text" autocomplete="off" required="field is required">
        </div>
        <input type="submit" class="btn btn-primary" id="submit_query" value="Search" name="psearch" style="border-radius: 0px; background-color: #cccccc; height: 37px;"/>
    </div>
    <!--Search Filters Start Here-->
    <div class="filters fade hidden" onclick="this.classList.remove('fade');">
        ${budget}
        ${bedroom}
        ${clearbtn}
    </div>
    <!--Search Filters Ends Here-->
</div>      
`;
ctab = `
<div id="searchbar-wraper">
    <div class='searchBox'>
        <div class="ptype dropdown">
            <a class="btn dropdown-toggle" style="width:127px; border-radius: 0px; background-color: #cccccc; height: 37px;" type="button" data-toggle="dropdown">All Commercial</a>
            <ul class="dropdown-menu" style="width: 300px;">
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype">  All Commercial</li>
                ${ptypeul}
            </ul>
        </div>
        <div class="ptype querybar">
            <input class="querybox" onclick="showMenu()" name="keyword" onfocus="showMenu()" onfocusout="hideMenu()"
                placeholder="Type Location or Project/Society or Keyword" type="text" autocomplete="off" required="field is required">
        </div>
        <input type="submit" class="btn btn-primary" id="submit_query" value="Search" name="csearch" style="border-radius: 0px; background-color: #cccccc; height: 37px;"/>
    </div>
    <!--Search Filters Start Here-->
    <div class="filters fade hidden" onclick="this.classList.remove('fade');">
        <div class="stype dropdown">
            <a class="btn dropdown-toggle" type="button" data-toggle="dropdown">Construction Status</a>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><input type="radio" value="0" name="siteType">Under Construction</li>
                <li class="dropdown-item"><input type="radio" value="1" name="siteType">Ready to move</li>
            </ul>
        </div>
        ${budget}
        ${area}
        ${clearbtn}
    </div>
    <!--Search Filters Ends Here-->
</div>      
`;
dtab = `
<div id="searchbar-wraper">
    <div class='searchBox'>
        <div class="ptype dropdown">
            <a class="btn dropdown-toggle" style="width:127px; border-radius: 0px; background-color: #cccccc; height: 37px;" type="button" data-toggle="dropdown">All Commercial</a>
            <ul class="dropdown-menu" style="width: 300px;">
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype">  All Residential</li>
                <li style="font-weight: 550;"><input type="checkbox" name="searchtype">  All Commercial</li>
                ${ptypeul}
            </ul>
        </div>
        <div class="ptype querybar">
            <input class="querybox" onclick="showMenu()" name="keyword" onfocus="showMenu()" onfocusout="hideMenu()"
                placeholder="Type Location or Project/Society or Keyword" type="text" autocomplete="off" required="field is required">
        </div>
        <input type="submit" class="btn btn-primary" id="submit_query" value="Search" name="dsearch" style="border-radius: 0px; background-color: #cccccc; height: 37px;"/>
    </div>
    <!--Search Filters Start Here-->
    <div class="filters fade hidden" onclick="this.classList.remove('fade');">
        ${budget}
        ${area}
        ${clearbtn}
    </div>
    <!--Search Filters Ends Here-->
</div>      
`;
const tabs = [btab, rtab, ptab, ctab, dtab];
showMenu = () => {
  document.querySelector(`.filters`).classList.remove('hidden');
  document.querySelector(`.filters`).classList.remove('fade');
};
hideMenu = () => {
  document.querySelector(`.filters`).classList.add('fade');
};
changeTab = (tabindex) => {
  document.getElementById('activetab').innerHTML = tabs[tabindex];
  document.querySelector('.search-tabs').childNodes.forEach((node) => {
    if (node instanceof Element) node.classList.remove('active');
  });
  document
    .querySelector('.search-tabs')
    .childNodes[2 * tabindex + 1].classList.add('active');
};
checkNumeric = (areaField) => {
  re = /^[0-9]+$/;
  if (!areaField.value.match(re)) areaField.value = '';
};
