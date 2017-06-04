var map = new BMap.Map("my_map");
map.setDefaultCursor("pointer");

map.enableScrollWheelZoom();
var point = new BMap.Point(103.9952550000,30.5886520000);
map.centerAndZoom(point, 13);
var gc = new BMap.Geocoder();

map.addControl(new BMap.NavigationControl());
map.addControl(new BMap.OverviewMapControl());
map.addControl(new BMap.ScaleControl());
map.addControl(new BMap.MapTypeControl());
map.addControl(new BMap.CopyrightControl());

var marker = new BMap.Marker(point);
map.addOverlay(marker);

marker.addEventListener("click", function(e)
{
    document.getElementById("lonlat").value = e.point.lng;/*纬度*/
    document.getElementById("lonlat2").value =e.point.lat;/*经度*/

});


marker.enableDragging();//是否能拖动

marker.addEventListener("dragend",function(e)
{
    gc.getLocation(e.point, function(rs)
    {
        showLocationInfo(e.point, rs);
    });
});


function showLocationInfo(pt, rs)
{
    var opts = {  width : 250, height: 150, title : "当前位置" } ;
    var addComp = rs.addressComponents;
    var addr = "当前位置：" + addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber + "<br/>";
    addr += "纬度: " + pt.lat + ", " + "经度：" + pt.lng;
    var infoWindow = new BMap.InfoWindow(addr, opts);
    marker.openInfoWindow(infoWindow);
}

map.addEventListener("click", function(e)
{
    document.getElementById("lonlat").value = e.point.lng;
    document.getElementById("lonlat2").value = e.point.lat;
});


var traffic = new BMap.TrafficLayer();
map.addTileLayer(traffic);


function iploac(result)
{
    var cityName = result.name;
}

var myCity = new BMap.LocalCity();
myCity.get(iploac);

function sear(result)
{
    var local = new BMap.LocalSearch(map, {renderOptions:{map: map} });
    local.search(result);
}