<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<form class="col-xs-12" name="contact" method="post"
      style="padding:0px; font-family: RobotoSlabRegular">
    <input type="hidden" name="id_contact" value="{id_contact}">
    <div id="info_Country_City_District" 
         style="display:block;
         font-size: 14px; 
         margin-bottom: 15px"> 
        <div class="col-xs-12 col-sm-4 col-md-4" id="info_Country" 
             style="padding-left:0px">
            <span id="p_country">Quốc Gia<span style="color:red">*</span></span>
            <select id="country" 
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px; 
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad">
                <option>Việt Nam</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4" id="info_City"
             style="padding-left:0px">
            <span id="p_city">Thành phố<span style="color:red">*</span></span>
            <select id="list_city_buy" 
                    name="list_city_buy" 
                    oninput="functionOninput();"
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    onChange="city_selected('list_city_buy', 'list_district_buy');">
                <option value = "Chưa chọn tỉnh/thành">Chọn tỉnh thành</option>
                <option value = "Hà Nội" {selected_Hà Nội}>Hà Nội</option>
                <option value = "Hồ Chí Minh" {selected_Hồ Chí Minh}>Hồ Chí Minh</option>
                <option value = "Tỉnh Hà Giang" {selected_Tỉnh Hà Giang}>Tỉnh Hà Giang</option>
                <option value = "Tỉnh Cao Bằng" {selected_Tỉnh Cao Bằng}>Tỉnh Cao Bằng</option>
                <option value = "Tỉnh Bắc Kạn" {selected_Tỉnh Bắc Kạn}>Tỉnh Bắc Kạn</option>
                <option value = "Tỉnh Tuyên Quang" {selected_Tỉnh Tuyên Quang}>Tỉnh Tuyên Quang</option>
                <option value = "Tỉnh Lào Cai" {selected_Tỉnh Lào Cai}>Tỉnh Lào Cai</option>
                <option value = "Tỉnh Điện Biên" {selected_Tỉnh Điện Biên}>Tỉnh Điện Biên</option>
                <option value = "Tỉnh Lai Châu" {selected_Tỉnh Lai Châu}>Tỉnh Lai Châu</option>
                <option value = "Tỉnh Sơn La" {selected_Tỉnh Sơn La}>Tỉnh Sơn La</option>
                <option value = "Tỉnh Yên Bái" {selected_Tỉnh Yên Bái}>Tỉnh Yên Bái</option>
                <option value = "Tỉnh Hoà Bình" {selected_Tỉnh Hòa Bình}>Tỉnh Hoà Bình</option>
                <option value = "Tỉnh Thái Nguyên" {selected_Tỉnh Thái Nguyên}>Tỉnh Thái Nguyên</option>
                <option value = "Tỉnh Lạng Sơn" {selected_Tỉnh Lạng Sơn}>Tỉnh Lạng Sơn</option>
                <option value = "Tỉnh Quảng Ninh" {selected_Tỉnh Quảng Ninh}>Tỉnh Quảng Ninh</option>
                <option value = "Tỉnh Bắc Giang" {selected_Tỉnh Bắc Giang}>Tỉnh Bắc Giang</option>
                <option value = "Tỉnh Phú Thọ" {selected_Tỉnh Phú Thọ}>Tỉnh Phú Thọ</option>
                <option value = "Tỉnh Vĩnh Phúc" {selected_Tỉnh Vĩnh Phúc}>Tỉnh Vĩnh Phúc</option>
                <option value = "Tỉnh Bắc Ninh" {selected_Tỉnh Bắc Ninh}>Tỉnh Bắc Ninh</option>
                <option value = "Tỉnh Hải Dương" {selected_Tỉnh Hải Dương}>Tỉnh Hải Dương</option>
                <option value = "Thành phố Hải Phòng" {selected_Thành phố Hải Phòng}>Thành phố Hải Phòng</option>
                <option value = "Tỉnh Hưng Yên" {selected_Tỉnh Hưng Yên}>Tỉnh Hưng Yên</option>
                <option value = "Tỉnh Thái Bình" {selected_Tỉnh Thái Bình}>Tỉnh Thái Bình</option>
                <option value = "Tỉnh Hà Nam" {selected_Tỉnh Hà Nam}>Tỉnh Hà Nam</option>
                <option value = "Tỉnh Nam Định" {selected_Tỉnh Nam Định}>Tỉnh Nam Định</option>
                <option value = "Tỉnh Ninh Bình" {selected_Tỉnh Ninh Bình}>Tỉnh Ninh Bình</option>
                <option value = "Tỉnh Thanh Hoá" {selected_Tỉnh Thanh Hóa}>Tỉnh Thanh Hoá</option>
                <option value = "Tỉnh Nghệ An" {selected_Tỉnh Nghệ An}>Tỉnh Nghệ An</option>
                <option value = "Tỉnh Hà Tĩnh" {selected_Tỉnh Hà Tĩnh}>Tỉnh Hà Tĩnh</option>
                <option value = "Tỉnh Quảng Bình" {selected_Tỉnh Quảng Bình}>Tỉnh Quảng Bình</option>
                <option value = "Tỉnh Quảng Trị" {selected_Tỉnh Quảng Trị}>Tỉnh Quảng Trị</option>
                <option value = "Tỉnh Thừa Thiên Huế" {selected_Tỉnh Thừa Thiên Huế}>Tỉnh Thừa Thiên Huế</option>
                <option value = "Thành phố Đà Nẵng" {selected_Thành phố Đà Nẵng}>Thành phố Đà Nẵng</option>
                <option value = "Tỉnh Quảng Nam" {selected_Tỉnh Quảng Nam}>Tỉnh Quảng Nam</option>
                <option value = "Tỉnh Quảng Ngãi" {selected_Tỉnh Quảng Ngãi}>Tỉnh Quảng Ngãi</option>
                <option value = "Tỉnh Bình Định" {selected_Tỉnh Bình Định}>Tỉnh Bình Định</option>
                <option value = "Tỉnh Phú Yên" {selected_Tỉnh Phú Yên}>Tỉnh Phú Yên</option>
                <option value = "Tỉnh Khánh Hoà" {selected_Tỉnh Khánh Hòa}>Tỉnh Khánh Hoà</option>
                <option value = "Tỉnh Ninh Thuận" {selected_Tỉnh Ninh Thuận}>Tỉnh Ninh Thuận</option>
                <option value = "Tỉnh Bình Thuận" {selected_Tỉnh Bình Thuận}>Tỉnh Bình Thuận</option>
                <option value = "Tỉnh Kon Tum" {selected_Tỉnh Kon Tum}>Tỉnh Kon Tum</option>
                <option value = "Tỉnh Gia Lai" {selected_Tỉnh Gia Lai}>Tỉnh Gia Lai</option>
                <option value = "Tỉnh Đắk Lắk" {selected_Tỉnh Đắk Lắk}>Tỉnh Đắk Lắk</option>
                <option value = "Tỉnh Đắk Nông" {selected_Tỉnh Đắk Nông}>Tỉnh Đắk Nông</option>
                <option value = "Tỉnh Lâm Đồng" {selected_Tỉnh Lâm Đồng}>Tỉnh Lâm Đồng</option>
                <option value = "Tỉnh Bình Phước" {selected_Tỉnh Bình Phước}>Tỉnh Bình Phước</option>
                <option value = "Tỉnh Tây Ninh" {selected_Tỉnh Tây Ninh}>Tỉnh Tây Ninh</option>
                <option value = "Tỉnh Bình Dương" {selected_Tỉnh Bình Dương}>Tỉnh Bình Dương</option>
                <option value = "Tỉnh Đồng Nai" {selected_Tỉnh Đồng Nai}>Tỉnh Đồng Nai</option>
                <option value = "Tỉnh Bà Rịa - Vũng Tàu" {selected_Tỉnh Bà Rịa - Vũng Tàu}>Tỉnh Bà Rịa - Vũng Tàu</option>
                <option value = "Tỉnh Long An" {selected_Tỉnh Long An}>Tỉnh Long An</option>
                <option value = "Tỉnh Tiền Giang" {selected_Tỉnh Tiền Giang}>Tỉnh Tiền Giang</option>
                <option value = "Tỉnh Bến Tre" {selected_Tỉnh Bến Tre}>Tỉnh Bến Tre</option>
                <option value = "Tỉnh Trà Vinh" {selected_Tỉnh Trà Vinh}>Tỉnh Trà Vinh</option>
                <option value = "Tỉnh Vĩnh Long" {selected_Tỉnh Vĩnh Long}>Tỉnh Vĩnh Long</option>
                <option value = "Tỉnh Đồng Tháp" {selected_Tỉnh Đồng Tháp}>Tỉnh Đồng Tháp</option>
                <option value = "Tỉnh An Giang" {selected_Tỉnh An Giang}>Tỉnh An Giang</option>
                <option value = "Tỉnh Kiên Giang" {selected_Tỉnh Kiên Giang}>Tỉnh Kiên Giang</option>
                <option value = "Thành phố Cần Thơ" {selected_Thành phố Cần Thơ}>Thành phố Cần Thơ</option>
                <option value = "Tỉnh Hậu Giang" {selected_Tỉnh Hậu Giang} >Tỉnh Hậu Giang</option>
                <option value = "Tỉnh Sóc Trăng" {selected_Tỉnh Sóc Trăng}>Tỉnh Sóc Trăng</option>
                <option value = "Tỉnh Bạc Liêu" {selected_Tỉnh Bạc Liêu}>Tỉnh Bạc Liêu</option>
                <option value = "Tỉnh Cà Mau" {selected_Tỉnh Cà Mau}>Tỉnh Cà Mau</option>
                <option value = "Tỉnh Hà Tây" {selected_Tỉnh Hà Tây}>Tỉnh Hà Tây</option>
            </select>
        </div> 
        <div id="info_District" class="col-xs-12 col-sm-4 col-md-4"
             style="padding-left: 0px">
            <span id="p_district">Quận/Huyện<span style="color:red">*</span></span>
            <select id="list_district_buy" 
                    oninput="functionOninput();"
                    name="list_district_buy"
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad">
                <option value = "Chưa chọn quận/huyện">Chọn quận huyện</option> 
                <option value = "{district_value}" {selected_district_value}>{district_value}</option>
            </select>
        </div>
    </div>
    <div id="table_Dia_Chi">
        <div id="info_ward" class="col-xs-12 col-sm-4 col-md-4" 
             style="padding-left: 0px">
            <span id="text_ward">Phường<span style="color:red">*</span></span>
            <input type="text" 
                   id="tags" 
                   oninput="functionOninput();"
                   class="form-control"
                   style="-webkit-border-radius: 10px;
                   -moz-border-radius: 10px;
                   border-radius: 10px;
                   height: 40px;
                   outline:none;
                   padding: 5px;
                   font-family: RobotoSlabRegular;
                   font-size: 14px;
                   border: 1px solid #ddd;
                   font-weight: lighter;
                   color: #adadad"
                   name="text_edit_number_ward" 
                   value="{text_ward}"
                   maxlength="20">
        </div>       
        <div id="info_street"
             class="col-xs-12 col-sm-4 col-md-4" style="padding-left: 0px">
            <span id="text_street">Đường<span style="color:red">*</span></span>
            <input  type="text" 
                    id="tags_street" 
                    oninput="functionOninput();"
                    class="form-control"
                    style= "-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px; 
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    name="text_edit_number_street" 
                    value="{text_street}"
                    maxlength="40">
        </div>
        <div id="info_adress" class="col-xs-12 col-sm-4 col-md-4"
             style="padding-left: 0px">
            <span id="text_address">Số nhà<span style="color:red">*</span></span>
            <input  type="text"
                    oninput="functionOninput();"
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    id="text_edit_number_address"
                    name="text_edit_number_address"
                    value="{text_address}"
                    maxlength="10">
        </div>
    </div> 
    <div id="table_Chung_Cu">
        <div id="info_adress_Chung_Cu" class="col-xs-12 col-sm-4 col-md-4"
             style="padding-left: 0px"> 
            <div id="text_address_Chung_Cu">Chung cư/Tòa nhà</div>
            <input  type="text" 
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    id ="text_edit_number_address_Chung_Cu" 
                    name ="text_edit_number_address_Chung_Cu" 
                    value="{text_address_Chung_Cu}"
                    maxlength="40">
        </div>
        <div id="info_floor_Chung_Cu"
             class="col-xs-12 col-sm-4 col-md-4" style="padding-left: 0px">
            <span id="text_floor_Chung_Cu">Lầu</span>
            <input  type="text" 
                    id="text_edit_floor_Chung_Cu" 
                    class="form-control"
                    style="-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    name="text_edit_floor_Chung_Cu" 
                    value="{text_edit_floor_Chung_Cu}"
                    maxlength="10">
        </div>
        <div id="info_room_Chung_Cu" class="col-xs-12 col-sm-4 col-md-4" 
             style="padding-left:0px">
            <div id="text_room_Chung_Cu">Căn hộ</div>
            <input  type="text" 
                    id ="text_edit_room_Chung_Cu" 
                    class ="form-control"
                    style = "-webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    height: 40px;
                    outline:none;
                    padding: 5px;
                    font-family: RobotoSlabRegular;
                    font-size: 14px;
                    border: 1px solid #ddd;
                    font-weight: lighter;
                    color: #adadad"
                    name="text_edit_room_Chung_Cu" 
                    value="{text_edit_room_Chung_Cu}"
                    maxlength="40">
        </div>
        <input type="submit"
               name="save"
               onclick="myFunctionSubmit();"
               value="Thêm địa chỉ"
               style="-webkit-border-radius: 20px;
               -moz-border-radius: 20px;
               background-color: #ff767c;
               border: none;
               color: #fff;
               font-family:PoetsenOne;
               outline:none;
               border-radius: 20px;
               padding: 5px;
               width: 110px;
               font-size: 14px;
               margin-top: 15px;
               margin-bottom: 15px">

    </div>
</form>
<script>
    function myFunctionSubmit() {
        var city = document.getElementById("list_city_buy");
        var selectedCity = city.options[city.selectedIndex].value;
        if (selectedCity === "Chưa chọn tỉnh/thành") {
            document.getElementById("list_city_buy").setCustomValidity("Vui lòng chọn thành phố!");
        } else {
            document.getElementById("list_city_buy").setCustomValidity("");
            document.getElementById("list_district_buy").required = true;
            var district = document.getElementById("list_district_buy");
            var selectedDistrict = district.options[district.selectedIndex].value;
            if (selectedDistrict === "Chưa chọn quận/huyện") {
                document.getElementById("list_district_buy").setCustomValidity("Vui lòng chọn quận huyện!");
            } else {
                document.getElementById("list_district_buy").setCustomValidity("");
                document.getElementById("tags").required = true;
                if (document.getElementById("tags").value === "") {
                    document.getElementById("tags").setCustomValidity("Vui lòng nhập tên phường!");
                } else {
                    document.getElementById("tags").setCustomValidity("");
                    document.getElementById("tags_street").required = true;
                    if (document.getElementById("tags_street").value === "") {
                        document.getElementById("tags_street").setCustomValidity("Vui lòng nhập tên đường!");
                    } else {
                        document.getElementById("tags_street").setCustomValidity("");
                        document.getElementById("text_edit_number_address").required = true;
                        if (document.getElementById("text_edit_number_address").value === "") {
                            document.getElementById("text_edit_number_address").setCustomValidity("Vui lòng nhập số nhà!");
                        } else {
                            document.getElementById("text_edit_number_address").setCustomValidity("");
                        }
                    }
                }
            }
        }
    }
    function functionOninput() {
        document.getElementById("list_city_buy").setCustomValidity("");
        document.getElementById("list_district_buy").setCustomValidity("");
        document.getElementById("tags").setCustomValidity("");
        document.getElementById("tags_street").setCustomValidity("");
        document.getElementById("text_edit_number_address").setCustomValidity("");
    }
</script>
<script>
    $(function () {
        var availableChungCuTags = [];
        $("#text_edit_number_address_Chung_Cu").autocomplete({
            source: availableChungCuTags
        });
    });
</script>
<script>
    $(function () {
        var availableTags = [
            "Phường 1",
            "Phường 2",
            "Phường 3",
            "Phường 4",
            "Phường 5",
            "Phường 6",
            "Phường 7",
            "Phường 8",
            "Phường 9",
            "Phường 10",
            "Phường 11",
            "Phường 12",
            "Phường 13",
            "Phường 14",
            "Phường 15",
            "Phường 16",
            "Phường 17",
            "Phường 18",
            "Phường 19",
            "Phường 21",
            "Phường 22",
            "Phường 24",
            "Phường 25",
            "Phường 26",
            "Phường 27",
            "Phường 28",
            "Phường Bến Nghé",
            "Phường Bến Thành",
            "Phường Cô Giang",
            "Phường Cầu Kho",
            "Phường Cầu Ông Lãnh",
            "Phường Đa Kao",
            "Phường Nguyễn Thái Bình",
            "Phường Nguyễn Cư Trinh",
            "Phường Phạm Ngũ Lão",
            "Phường Tân Định",
            "Phường An Khánh",
            "Phường An Lợi Đông",
            "Phường An Phú",
            "Phường Bình An",
            "Phường Bình Khánh",
            "Phường Bình Trưng Đông",
            "Phường Bình Trưng Tây",
            "Phường Cát Lái",
            "Phường Thạnh Mỹ Lợi",
            "Phường Thảo Điền",
            "Phường Thủ Thiêm",
            "Phường Bình Thuận",
            "Phường Phú Mỹ",
            "Phường Phú Thuận",
            "Phường Tân Hưng",
            "Phường Tân Kiểng",
            "Phường Tân Phong",
            "Phường Tân Phú",
            "Phường Tân Quy",
            "Phường Tân Thuận Đông",
            "Phường Tân Thuận Tây",
            "Phường Phước Long A",
            "Phường Phước Long B",
            "Phường Tăng Nhơn Phú A",
            "Phường Tăng Nhơn Phú B",
            "Phường Long Trường",
            "Phường Trường Thạnh",
            "Phường Phước Bình",
            "Phường Tân Phú",
            "Phường Hiệp Phú",
            "Phường Long Thạnh Mỹ",
            "Phường Long Bình",
            "Phường Long Phước",
            "Phường Phú Hữu",
            "Phường Thạnh Xuân",
            "Phường Hiệp Thành",
            "Phường Thới An",
            "Phường Thạnh Lộc",
            "Phường Tân Chánh Hiệp",
            "Phường Tân Thới Hiệp",
            "Phường An Phú Đông",
            "Phường Trung Mỹ Tây",
            "Phường Tân Thới Nhất",
            "Phường Đông Hưng Thuận",
            "Phường Tân Hưng Thuận",
            "Phường Hiệp Bình Chánh",
            "Phường Hiệp Bình Phước",
            "Phường Tam Phú",
            "Phường Tam Bình",
            "Phường Linh Chiểu",
            "Phường Linh Ðông",
            "Phường Linh Tây",
            "Phường LinhXuân",
            "Phường Linh Trung",
            "Phường Bình Thọ",
            "Phường Bình Chiểu",
            "Phường Trường Thọ",
            "Phường Tân Sơn Nhì",
            "Phường Tây Thạnh",
            "Phường Sơn Kỳ",
            "Phường Tân Quý",
            "Phường Tân Thành",
            "Phường Phú Thọ Hòa",
            "Phường Phú Thạnh",
            "Phường Phú Trung",
            "Phường Hòa Thạnh",
            "Phường Hiệp Tân",
            "Phường Tân Thới Hòa",
            "Phường Bình Hưng Hoà",
            "Phường Bình Hưng Hoà A",
            "Phường Bình Hưng Hoà B",
            "Phường Bình Trị Đông",
            "Phường Bình Trị Đông A",
            "Phường Bình Trị Đông B",
            "Phường Tân Tạo",
            "Phường Tân Tạo A",
            "Phường An Lạc",
            "Phường An Lạc A",
            //Huyện Bình Chánh
            "Thị Trấn Tân Túc",
            "Xã An Phú Tây",
            "Xã Bình Chánh",
            "Xã Bình Hưng",
            "Xã Bình Lợi",
            "Xã Đa Phước",
            "Xã Hưng Long",
            "Xã Lê Minh Xuân",
            "Xã Phạm Văn Hai",
            "Xã Phong Phú",
            "Xã Quy Đức",
            "Xã Tân Kiên",
            "Xã Tân Nhựt",
            "Xã Tân Quý Tây",
            "Xã Vĩnh Lộc A",
            "Xã Vĩnh Lộc B",
            //Huyện Cần Giờ
            "Thị Trấn Cần Thạnh",
            "Xã Bình Khánh",
            "Xã An Thới Đông",
            "Xã Tam Thôn Hiệp",
            "Xã Thạnh An",
            "Xã Lý Nhơn",
            "Xã Long Hoà",
            //Huyện Củ Chi
            "Thị Trấn Củ Chi",
            "Xã Phú Hòa Đông",
            "Xã Tân Thạnh Đông",
            "Xã Tân Thạnh Tây",
            "Xã Tân An Hội",
            "Xã Tân Thông Hội",
            "Xã Trung An",
            "Xã Phước Vĩnh An",
            "Xã Hòa Phú",
            "Xã Thái Mỹ",
            "Xã Phước Thạnh",
            "Xã An Phú",
            "Xã Trung Lập Thượng",
            "Xã Nhuận Đức",
            "Xã Phạm Văn Cội",
            "Xã Bình Mỹ",
            "Xã Phước Hiệp",
            "Xã Trung Lập Hạ",
            "Xã Tân Phú Trung",
            "Xã Phú Mỹ Hưng",
            "Xã An Nhơn Tây",
            //Huyện Hóc Môn
            "Thị Trấn Hóc Môn",
            "Xã Nhị Bình",
            "Xã Xuân Thới Đông",
            "Xã Xuân Thới Thượng",
            "Xã Xuân Thới Sơn",
            "Xã Bà Điểm",
            "Xã Đông Thạnh",
            "Xã Tân Hiệp",
            "Xã Thới Tam Thôn",
            "Xã Trung Chánh",
            "Xã Tân Xuân",
            "Xã Tân Thới Nhì",
            //Huyện Nhà Bè
            "Thị Trấn Nhà Bè",
            "Xã Phú Xuân",
            "Xã Long Thới",
            "Xã Nhơn Đức",
            "Xã Phước Kiển",
            "Xã Hiệp Phước",
            "Xã Phước Lộc"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
    });
</script>
<script>
    $(function () {
        var availableTags_Street = [
            "Alexandre De Rhodes",
            "An Bình",
            "An Dương Vương",
            "An Điềm",
            "An Hạ",
            "An Hội",
            "An Nhơn",
            "An Phú",
            "An Phú Tây",
            "An Thới Đông",
            "Âu Cơ",
            "Âu Dương Lân",
            "Ba Đình",
            "Ba Gia",
            "3 Tháng 2",
            "Ba Tơ",
            "Ba Vân",
            "Ba Vì",
            "Bà Hạt",
            "Bà Hom",
            "Bà Huyện Thanh Quan",
            "Bà Ký",
            "Bà Lài",
            "Bà Lê Chân",
            "Bà Triệu",
            "Bác Ái",
            "Bạch Đằng",
            "Bạch Mã",
            "Bạch Vân",
            "Bãi Sậy",
            "Bàn Cờ",
            "Bành Văn Trân",
            "Bàu Trâm",
            "Bàu Tre",
            "Bắc Hải",
            "Bế Văn Cấm",
            "Bế Văn Đàn",
            "Bến Cát",
            "Bến Cỏ",
            "Bến Đình",
            "Bến Súc",
            "Bến Than",
            "Bình Đông",
            "Bình Đức",
            "Bình Hưng",
            "Bình Long",
            "Bình Lợi",
            "Bình Mỹ",
            "Bình Quới",
            "Bình Tây",
            "Bình Thới",
            "Bình Tiên",
            "Bình Trị Đông",
            "Bình Trưng",
            "Bình Trường",
            "Bông Sao",
            "Bông Văn Dĩa",
            "Bùi Chi Nhuận",
            "Bùi Công Trừng",
            "Bùi Dương Lịch",
            "Bùi Đình Túy",
            "Bùi Huy Bích",
            "Bùi Hữu Diên",
            "Bùi Hữu Nghĩa",
            "Bùi Lâm",
            "Bùi Minh Trực",
            "Bùi Thanh Khiết",
            "Bùi Thị Điệt",
            "Bùi Thị He",
            "Bùi Thị Xuân",
            "Bùi Tư Đoàn",
            "Bùi Văn Ba",
            "Bùi Văn Ngữ",
            "Bùi Viện",
            "Bưng Sáu Xã",
            "Bửu Long",
            "Ca Văn Thỉnh",
            "Cá Lăng",
            "Cách Mạng Tháng Tám",
            "Calmette",
            "Cao Bá Nhạ",
            "Cao Bá Quát",
            "Cao Đạt",
            "Cao Lỗ",
            "Cao Thắng",
            "Cao Văn Lầu",
            "Cao Xuân Dục",
            "Cao Xuân Huy",
            "Cầm Bá Thước",
            "Cầu Đình",
            "Cây Trắc",
            "Chánh Hưng",
            "Châu Thới",
            "Châu Văn Liêm",
            "Châu Vĩnh Tế",
            "Chế Lan Viên",
            "Chiêu Anh Các",
            "Chu Mạnh Trinh",
            "Chu Thiên",
            "Chu Văn An",
            "Chử Đồng Tử",
            "Chương Dương",
            "Cô Bắc",
            "Cô Giang",
            "Công Chúa Ngọc Hân",
            "Cống Quỳnh",
            "Cộng Hòa",
            "Cù Chính Lan",
            "Cư Xá Đô Thành",
            "Cửu Long",
            "Dạ Nam",
            "Dã Tượng",
            "Dân Chủ",
            "Dân Tộc",
            "Dân Trí",
            "Diên Hồng",
            "Duy Tân",
            "Duyên Hải",
            "Dương Bá Cung",
            "Dương Bá Trạc",
            "Dương Bạch Mai",
            "Dương Đình Nghệ",
            "Dương Đức Hiền",
            "Dương Khuê",
            "Dương Quảng Hàm",
            "Dương Tử Giang",
            "Dương Văn Dương",
            "Dương Văn Hạnh",
            "Dương Vân Nga",
            "Đào Cam Mộc",
            "Đào Duy Anh",
            "Đào Duy Từ",
            "Đào Nguyên Phổ",
            "Đào Sư Tích",
            "Đào Tấn",
            "Đào Tông Nguyên",
            "Đào Trí",
            "Đào Trinh Nhất",
            "Đặng Chất",
            "Đặng Dung",
            "Đặng Lộ",
            "Đặng Minh Khiêm",
            "Đặng Nguyên Cẩn",
            "Đặng Tất",
            "Đặng Thai Mai",
            "Đặng Thái Cân",
            "Đặng Thị Nhu",
            "Đặng Trần Côn",
            "Đặng Văn Ngữ",
            "Đề Thám",
            "Điện Biên Phủ",
            "Đinh Bộ Lĩnh",
            "Đinh Công Tráng",
            "Đinh Điền",
            "Đinh Đức Thiện",
            "Đinh Hòa",
            "Đinh Lễ",
            "Đinh Liệt",
            "Đinh Tiên Hoàng",
            "Đình Phong Phú",
            "Đoàn Công Bửu",
            "Đoàn Giỏi",
            "Đoàn Nhữ Hài",
            "Đoàn Phú Tứ",
            "Đoàn Thị Điểm",
            "Đoàn Văn Bơ",
            "Đô Đốc Chấn",
            "Đô Đốc Long",
            "Đô Đốc Lộc",
            "Đô Đốc Thủ",
            "Đồ Sơn",
            "Đỗ Công Tường",
            "Đỗ Đức Dục",
            "Đỗ Năng Tế",
            "Đỗ Ngọc Thạnh",
            "Đỗ Nhuận",
            "Đỗ Quang Đẩu",
            "Đỗ Tấn Phong",
            "Đỗ Văn Sữu",
            "Đỗ Xuân Hợp",
            "Đông Du",
            "Đông Hồ",
            "Đông Sơn",
            "Đồng Đen",
            "Đồng Khởi",
            "Đồng Nai",
            "Đống Đa",
            "Einstein",
            "Gia Phú",
            "Giải Phóng",
            "Giang Cự Vọng",
            "Giồng Ao",
            "Giồng Cát",
            "Gò Cẩm Đệm",
            "Gò Công",
            "Gò Dưa",
            "Gò Đình",
            "Gót Chàng",
            "Hà Bà Tường",
            "Hà Huy Giáp",
            "Hà Tôn Quyền",
            "Hai Bà Trưng",
            "Hải Thượng Lãn Ông",
            "Hải Triều",
            "Hàm Nghi",
            "Hàm Tử",
            "Hàn Hải Nguyên",
            "Hàn Mặc Tử",
            "Hàn Thuyên",
            "Hạnh Thông",
            "Hậu Giang",
            "Hiền Vương",
            "Hiệp Bình",
            "Hòa Bình",
            "Hòa Hảo",
            "Hòa Hưng",
            "Hòa Mỹ",
            "Hoài Thanh",
            "Hoàng Bá Huân",
            "Hoàng Bật Đạt",
            "Hoàng Diệu",
            "Hoàng Dư Khương",
            "Hoàng Đạo Thúy",
            "Hoàng Đức Tương",
            "Hoàng Hoa Thám",
            "Hoàng Hữu Nam",
            "Hoàng Kế Viêm",
            "Hoàng Lệ Kha",
            "Hoàng Minh Giám",
            "Hoàng Ngọc Phách",
            "Hoàng Quốc Việt",
            "Hoàng Sa",
            "Hoàng Sĩ Khải",
            "Hoàng Tăng Bí",
            "Hoàng Thiều Hoa",
            "Hoàng Văn Thụ",
            "Hoàng Việt",
            "Hoàng Xuân Nhị",
            "Học Lạc",
            "Hồ Bá Kiện",
            "Hồ Biểu Chánh",
            "Hồ Đắc Di",
            "Hồ Hảo Hớn",
            "Hồ Học Lãm",
            "Hồ Huấn Nghiệp",
            "Hồ Ngọc Cẩn",
            "Hồ Tùng Mậu",
            "Hồ Văn Huê",
            "Hồ Xuân Hương",
            "Hồng Bàng",
            "Hồng Đức",
            "Hồng Hà",
            "Hồng Lĩnh",
            "Hồng Sến",
            "Hùng Vương",
            "Huyền Quang",
            "Huyền Trân Công Chúa",
            "Huyện Toại",
            "Huỳnh Bá Chánh",
            "Huỳnh Đình Hai",
            "Huỳnh Khương An",
            "Huỳnh Khương Ninh",
            "Huỳnh Mẫn Đạt",
            "Huỳnh Tấn Phát",
            "Huỳnh Thị Phụng",
            "Huỳnh Thiện Lộc",
            "Huỳnh Thúc Kháng",
            "Huỳnh Tịnh Của",
            "Huỳnh Văn Bánh",
            "Huỳnh Văn Chính",
            "Huỳnh Văn Nghệ",
            "Huỳnh Văn Trí",
            "Hưng Long",
            "Hưng Phú",
            "Hương Giang",
            "Kha Vạn Cân",
            "Khái Hưng",
            "Khánh Hội",
            "Khiếu Năng Tĩnh",
            "Khổng Tử",
            "Khuông Việt",
            "Kim Biên",
            "Kinh Dương Vương",
            "Kỳ Đồng",
            "Ký Con",
            "Ký Hòa",
            "Lã Xuân Oai",
            "Lạc Long Quân",
            "Lam Sơn",
            "Lan Mê Linh",
            "Láng Le - Bàu Cò",
            "Láng Thé",
            "Lãnh Binh Thăng",
            "Lão Tử",
            "Lâm Hoành",
            "Lâm Văn Tết",
            "Lê Anh Xuân",
            "Lê Bá Trinh",
            "Lê Cao Lãng",
            "Lê Cẩn",
            "Lê Công Kiều",
            "Lê Cơ",
            "Lê Duẫn",
            "Lê Duy Nhuận",
            "Lê Đại Hành",
            "Lê Đình Cẩn",
            "Lê Đình Chi",
            "Lê Đình Thám",
            "Lê Đức Thọ",
            "Lê Hi",
            "Lê Hồng Phong",
            "Lê Lai",
            "Lê Lâm",
            "Lê Lợi",
            "Lê Minh Xuân",
            "Lê Ngân",
            "Lê Ngô Cát",
            "Lê Ngung",
            "Lê Quang Định",
            "Lê Quang Kim",
            "Lê Quang Sung",
            "Lê Quốc Hưng",
            "Lê Quý Đôn",
            "Lê Sát",
            "Lê Tấn Kế",
            "Lê Tấn Quốc",
            "Lê Thạch",
            "Lê Thành Phương",
            "Lê Thánh Tôn",
            "Lê Thị Bạch Cát",
            "Lê Thị Hoa",
            "Lê Thị Hồng Gấm",
            "Lê Thị Riêng",
            "Lê Thọ Xuân",
            "Lê Thúc Hoạch",
            "Lê Thương",
            "Lê Trọng Tấn",
            "Lê Trung Nghĩa",
            "Lê Trực",
            "Lê Tung",
            "Lê Tự Tài",
            "Lê Văn Chí",
            "Lê Văn Hữu",
            "Lê Văn Linh",
            "Lê Văn Lương",
            "Lê Văn Sĩ",
            "Lê Văn Thọ",
            "Lê Văn Việt",
            "Linh Đông",
            "Linh Trung",
            "Linh Xuân",
            "Lò Gốm",
            "Lò Siêu",
            "Long Hưng",
            "Lũy Bán Bích",
            "Lữ Gia",
            "Lương Đắc Bằng",
            "Lương Định Của",
            "Lương Hữu Khánh",
            "Lương Khải Siêu",
            "Lương Khánh Thiện",
            "Lương Ngọc Quyến",
            "Lương Nhữ Hộc",
            "Lương Thế Vinh",
            "Lương Văn Can",
            "Lương Văn Nho",
            "Lưu Hữu Phước",
            "Lưu Khai Hồng",
            "Lưu Nhân Chú",
            "Lưu Quí Kỳ",
            "Lưu Trọng Lư",
            "Lưu Văn Lang",
            "Lưu Xuân Tín",
            "Lý Chiêu Hoàng",
            "Lý Chính Thắng",
            "Lý Đạo Thành",
            "Lý Nam Đế",
            "Lý Phục Man",
            "Lý Tế Xuyên",
            "Lý Thái Tổ",
            "Lý Thái Tông",
            "Lý Thánh Tông",
            "Lý Thường Kiệt",
            "Lý Tự Trọng",
            "Lý Văn Phức",
            "Mả Lò",
            "Mã Lộ",
            "Mạc Cửu",
            "Mạc Đĩnh Chi",
            "Mạc Thị Bưởi",
            "Mạc Thiên Tích",
            "Mai Am",
            "Mai Bá Hương",
            "Mai Hắc Đế",
            "Mai Lão Bạng",
            "Mai Thị Lưu",
            "Mai Văn Ngọc",
            "Mai Xuân Thưởng",
            "Man Thiện",
            "Mặc Vân",
            "Mễ Cốc",
            "Minh Phụng",
            "Mít Nài",
            "Quốc Lộ 1A",
            "Mỹ Hòa",
            "Nam Cao",
            "Nam Hòa",
            "Nam Kỳ Khởi Nghĩa",
            "Nam Quốc Cang",
            "Năm Châu",
            "Năm Mươi(50)",
            "Nghĩa Thục",
            "Ngô Chí Quốc",
            "Ngô Đức Kế",
            "Ngô Gia Tự",
            "Ngô Nhân Tịnh",
            "Ngô Quang Huy",
            "Ngô Quyền",
            "Ngô Sĩ Liên",
            "Ngô Tất Tố",
            "Ngô Thời Nhiệm",
            "Ngô Văn Năm",
            "Ngô Văn Sở",
            "Ngô Y Linh",
            "Nguyên Hồng",
            "Nguyễn An Khương",
            "Nguyễn An Ninh",
            "Nguyễn Án",
            "Nguyễn Ảnh Thủ",
            "Nguyễn Bá Học",
            "Nguyễn Bá Luật",
            "Nguyễn Bặc",
            "Nguyễn Biểu",
            "Nguyễn Bình",
            "Nguyễn Bỉnh Khiêm",
            "Nguyễn Cảnh Chân",
            "Nguyễn Cảnh Dị",
            "Nguyễn Chánh Sắt",
            "Nguyễn Chế Nghĩa",
            "Nguyễn Chí Thanh",
            "Nguyễn Chích",
            "Nguyễn Công Hoan",
            "Nguyễn Công Tiễu",
            "Nguyễn Công Trứ",
            "Nguyễn Cư Trinh",
            "Nguyễn Cửu Đàm",
            "Nguyễn Cửu Phú",
            "Nguyễn Cửu Vân",
            "Nguyễn Du",
            "Nguyễn Duy",
            "Nguyễn Duy Dương",
            "Nguyễn Duy Trình",
            "Nguyễn Dữ",
            "Nguyễn Đại Năng",
            "Nguyễn Đình Chi",
            "Nguyễn Đình Chiểu",
            "Nguyễn Đình Chính",
            "Nguyễn Đình Huân",
            "Nguyễn Đình Khơi",
            "Nguyễn Gia Thiều",
            "Nguyễn Giản Thanh",
            "Nguyễn Hậu",
            "Nguyễn Hiền",
            "Nguyễn Hiến Lê",
            "Nguyễn Hồng Đào",
            "Nguyễn Hới",
            "Nguyễn Huệ",
            "Nguyễn Huy Lượng",
            "Nguyễn Huy Tự",
            "Nguyễn Huy Tưởng",
            "Nguyễn Hữu Cảnh",
            "Nguyễn Hữu Cầu",
            "Nguyễn Hữu Dật",
            "Nguyễn Hữu Hào",
            "Nguyễn Hữu Thận",
            "Nguyễn Hữu Thọ",
            "Nguyễn Hữu Tiến",
            "Nguyễn Hữu Trí",
            "Nguyễn Khắc Nhu",
            "Nguyễn Khoái",
            "Nguyễn Khuyến",
            "Nguyễn Kiệm",
            "Nguyễn Kim",
            "Nguyễn Kim Cương",
            "Nguyễn Lâm",
            "Nguyễn Minh Châu",
            "Nguyễn Mỹ Ca",
            "Nguyễn Ngọc Cung",
            "Nguyễn Ngọc Lộc",
            "Nguyễn Ngọc Nhựt",
            "Nguyễn Ngọc Phương",
            "Nguyễn Nhược Thị",
            "Nguyễn Oanh",
            "Nguyễn Phạm Tuân",
            "Nguyễn Phi Khanh",
            "Nguyễn Phong Sắc",
            "Nguyễn Phúc Chu",
            "Nguyễn Phúc Nguyên",
            "Nguyễn Phúc Trú",
            "Nguyễn Quyền",
            "Nguyễn Sĩ Cố",
            "Nguyễn Sơn",
            "Nguyễn Sơn Hà",
            "Nguyễn Súy",
            "Nguyễn Tất Thành",
            "Nguyễn Thái Bình",
            "Nguyễn Thái Học",
            "Nguyễn Thái Sơn",
            "Nguyễn Thanh Tuyền",
            "Nguyễn Thành Vĩnh",
            "Nguyễn Thành Ý",
            "Nguyễn Thần Hiến",
            "Nguyễn Thi",
            "Nguyễn Thị Diệu",
            "Nguyễn Thị Định",
            "Nguyễn Thị Huỳnh",
            "Nguyễn Thị Minh Khai",
            "Nguyễn Thị Nghĩa",
            "Nguyễn Thị Nhỏ",
            "Nguyễn Thị Rành",
            "Nguyễn Thị Tần",
            "Nguyễn Thị Thập",
            "Nguyễn Thị Thử",
            "Nguyễn Thiện Thuật",
            "Nguyễn Thiếp",
            "Nguyễn Thông",
            "Nguyễn Thời Trung",
            "Nguyễn Thức Đường",
            "Nguyễn Thượng Hiền",
            "Nguyễn Tiểu La",
            "Nguyễn Trãi",
            "Nguyễn Tri Phương",
            "Nguyễn Trọng Lội",
            "Nguyễn Trọng Tuyển",
            "Nguyễn Trung Ngạn",
            "Nguyễn Trung Trực",
            "Nguyễn Trường Tộ",
            "Nguyễn Tuân",
            "Nguyễn Tư Nghiêm",
            "Nguyễn Tử Nha",
            "Nguyễn Văn Bảo",
            "Nguyễn Văn Bình",
            "Nguyễn Văn Chiêm",
            "Nguyễn Văn Công",
            "Nguyễn Văn Của",
            "Nguyễn Văn Cừ",
            "Nguyễn Văn Cự",
            "Nguyễn Văn Dung",
            "Nguyễn Văn Dưỡng",
            "Nguyễn Văn Đậu",
            "Nguyễn Văn Đừng",
            "Nguyễn Văn Giai",
            "Nguyễn Văn Giáp",
            "Nguyễn Văn Hoài",
            "Nguyễn Văn Huyên",
            "Nguyễn Văn Hưởng",
            "Nguyễn Văn Linh",
            "Nguyễn Văn Luông",
            "Nguyễn Văn Mai",
            "Nguyễn Văn Mại",
            "Nguyễn Văn Nghi",
            "Nguyễn Văn Nghĩa",
            "Nguyễn Văn Ngọc",
            "Nguyễn Văn Nguyễn",
            "Nguyễn Văn Phú",
            "Nguyễn Văn Quá",
            "Nguyễn Văn Tạo",
            "Nguyễn Văn Tăng",
            "Nguyễn Văn Thạnh",
            "Nguyễn Văn Thủ",
            "Nguyễn Văn Tố",
            "Nguyễn Văn Tráng",
            "Nguyễn Văn Trỗi",
            "Nguyễn Văn Vĩ",
            "Nguyễn Văn Vĩnh",
            "Nguyễn Viết Xuân",
            "Nguyễn Xí",
            "Nguyễn Xiển",
            "Nguyễn Xuân Khoát",
            "Nguyễn Xuân Ôn",
            "Nguyễn Xuân Phụng",
            "Nhất Chi Mai",
            "Nhật Lệ",
            "Nhật Tảo",
            "Nhiêu Tâm",
            "Nhiêu Tứ",
            "Nhữ Tiến Hiền",
            "Ni Sư Huỳnh Liên",
            "Ninh Tốn",
            "Nơ Trang Long",
            "Ông Ích Khiêm",
            "Pasteur",
            "Phạm Bành",
            "Phạm Bân",
            "Phạm Cự Lượng",
            "Phạm Đình Hổ",
            "Phạm Đình Toái",
            "Phạm Đôn",
            "Phạm Hồng Thái",
            "Phạm Hùng",
            "Phạm Huy Thông",
            "Phạm Hữu Chí",
            "Phạm Hữu Lầu",
            "Phạm Ngọc",
            "Phạm Ngọc Thạch",
            "Phạm Ngũ Lão",
            "Phạm Phú Thứ",
            "Phạm Phú Tiết",
            "Phạm Thế Hiển",
            "Phạm Văn Bạch",
            "Phạm Văn Chí",
            "Phạm Văn Chiêu",
            "Phạm Văn Cội",
            "Phạm Văn Hai",
            "Phạm Văn Xảo",
            "Phạm Vấn",
            "Phạm Viết Chánh",
            "Phan Anh",
            "Phan Bội Châu",
            "Phan Cát Tưu",
            "Phan Châu Trinh",
            "Phan Đăng Lưu",
            "Phan Đình Giót",
            "Phan Đình Phùng",
            "Phan Đình Thông",
            "Phan Huy Chú",
            "Phan Huy Ích",
            "Phan Huy Ôn",
            "Phan Huy Thực",
            "Phan Kế Bính",
            "Phan Liêm",
            "Phan Ngữ",
            "Phan Phù Tiên",
            "Phan Thúc Duyện",
            "Phan Tôn",
            "Phan Trọng Tuệ",
            "Phan Văn Đạt",
            "Phan Văn Hân",
            "Phan Văn Hớn",
            "Phan Văn Khỏe",
            "Phan Văn Lân",
            "Phan Văn Sửu",
            "Phan Văn Trị",
            "Phan Văn Trường",
            "Phan Xích Long",
            "Phó Cơ Điều",
            "Phó Đức Chính",
            "Phong Phú",
            "Phổ Quang",
            "Phù Đổng Thiên Vương",
            "Phú Châu",
            "Phú Định",
            "Phú Giáo",
            "Phú Hiệp",
            "Phú Hòa",
            "Phú Hữu",
            "Phú Lâm",
            "Phú Mỹ",
            "Phú Thọ",
            "Phú Thọ Hòa",
            "Phú Trung",
            "Phùng Chí Kiên",
            "Phùng Hưng",
            "Phùng Khắc Khoan",
            "Phùng Tá Chu",
            "Phùng Văn Cung",
            "Phước Hưng",
            "Phước Thiện",
            "Quách Văn Tuấn",
            "Quách Vũ",
            "Quang Trung",
            "Quảng Xuyên",
            "Quốc Hương",
            "Quy Đức",
            "Rạch Cát",
            "Rạch Sậy",
            "Rừng Sác",
            "Sông Đa",
            "Sông Đáy",
            "Sông Lu",
            "Sông Nhuệ",
            "Sông Thương",
            "Sơn Cang",
            "Sơn Kỳ",
            "Suối Lội",
            "Sư Thiện Chiếu",
            "Sư Vạn Hạnh",
            "Sương Nguyệt Ánh",
            "Tagore",
            "Tạ Dương Minh",
            "Tạ Mỹ Duật",
            "Tạ Quang Bửu",
            "Tạ Uyên",
            "Tam Đa",
            "Tam Đảo",
            "Tam Tân",
            "Tản Đà",
            "Tản Viên",
            "Tăng Bạt Hổ",
            "Tăng Nhơn Phú",
            "Tân Canh",
            "Tân Châu",
            "Tân Hàng",
            "Tân Hòa",
            "Tân Hòa Đông",
            "Tân Hóa",
            "Tân Hưng",
            "Tân Hương",
            "Tân Khai",
            "Tân Kiên",
            "Tân Kỳ - Tân Quý",
            "Tân Liêm",
            "Tân Long",
            "Tân Nhựt",
            "Tân Phước",
            "Tân Sơn Hòa",
            "Tân Sơn Nhì",
            "Tân Thành",
            "Tân Thuận Tây",
            "Tân Vĩnh",
            "Tây Hòa",
            "Tây Sơn",
            "Tây Thạnh",
            "Tên Lửa",
            "Thạch Lam",
            "Thạch Thị Thanh",
            "Thái Phiên",
            "Thái Văn Lung",
            "Thanh Đa",
            "Thanh Niên",
            "Thành Thái",
            "Thạnh Mỹ Lợi",
            "Tháp Mười",
            "Thăng Long",
            "Thân Nhân Trung",
            "Thép Mới",
            "Thế Lữ",
            "Thi Sách",
            "Thích Bửu Đăng",
            "Thích Mật Thể",
            "Thích Minh Nguyệt",
            "Thích Quảng Đức",
            "Thích Thiện Hòa",
            "Thiên Giang",
            "Thoại Ngọc Hầu",
            "Thông Tây Hội",
            "Thủ Khoa Huân",
            "Thuận Kiều",
            "Tô Hiến Thành",
            "Tô Hiệu",
            "Tô Ngọc Vân",
            "Tô Vĩnh Diện",
            "Tôn Đản",
            "Tôn Đức Thắng",
            "Tôn Quang Phiệt",
            "Tôn Thất Đạm",
            "Tôn Thất Hiệp",
            "Tôn Thất Điệp",
            "Tôn Thất Thuyết",
            "Tôn Thất Tùng",
            "Tống Duy Tân",
            "Tống Văn Trân",
            "Tổng Lung",
            "Trà Khúc",
            "Trang Tử",
            "Trần Bá Giao",
            "Trần Bình",
            "Trần Bình Trọng",
            "Trần Cao Vân",
            "Trần Chánh Chiếu",
            "Trần Doãn Khanh",
            "Trần Đại Nghĩa",
            "Trần Điện",
            "Trần Đình Xu",
            "Trần Hải Phụng",
            "Trần Hòa",
            "Trần Huy Liệu",
            "Trần Hưng Đạo",
            "Trần Hữu Trang",
            "Trần Kế Xương",
            "Trần Khánh Dư",
            "Trần Khắc Chân",
            "Trần Mai Ninh",
            "Trần Minh Quyền",
            "Trần Não",
            "Trần Nguyên Hãn",
            "Trần Nhân Tôn",
            "Trần Nhật Duật",
            "Trần Phú",
            "Trần Phú Cương",
            "Trần Quang Cơ",
            "Trần Quang Diệu",
            "Trần Quang Đạo",
            "Trần Quang Khải",
            "Trần Quốc Thảo",
            "Trần Quốc Toản",
            "Trần Quý",
            "Trần Quý Cáp",
            "Trần Quý Khoách",
            "Trần Thái Tông",
            "Trần Thanh Mại",
            "Trần Thánh Tông",
            "Trần Thiện Chánh",
            "Trần Thủ Độ",
            "Trần Triệu Luật",
            "Trần Trung Lập",
            "Trần Tuấn Khải",
            "Trần Tướng Công",
            "Trần Văn Dư",
            "Trần Văn Đang",
            "Trần Văn Giáp",
            "Trần Văn Kiểu",
            "Trần Văn Kỷ",
            "Trần Văn Ơn",
            "Trần Văn Thành",
            "Trần Xuân Hòa",
            "Trần Xuân Soạn",
            "Triệu Quang Phục",
            "Trịnh Đình Thảo",
            "Trịnh Đình Trọng",
            "Trịnh Hoài Đức",
            "Trịnh Như Khuê",
            "Trịnh Văn Cấn",
            "Trúc Đường",
            "Trung An",
            "Trung Chánh",
            "Trung Hưng",
            "Trung Mỹ Tây",
            "Truông Tre",
            "Trương Công Định",
            "Trương Đăng Quế",
            "Trương Đình Hội",
            "Trương Định",
            "Trương Hán Siêu",
            "Trương Hanh",
            "Trương Minh Ký",
            "Trương Phước Phan",
            "Trương Quốc Dụng",
            "Trương Văn Đa",
            "Trương Quyền",
            "Trương Vân Lĩnh",
            "Trương Vĩnh Ký",
            "Trường Chinh",
            "Trường Lưu",
            "Trường Sa",
            "Trường Sơn",
            "Trường Thọ",
            "Tú Mỡ",
            "Tú Xương",
            "Tuệ Tĩnh",
            "Tùng Thiện Vương",
            "Tuy Lý Vương",
            "Ung Văn Khiêm",
            "Út Tịch",
            "Ưu Long",
            "Vạn Kiếp",
            "Vạn Tượng",
            "Văn Cao",
            "Văn Chung",
            "Văn Thân",
            "Vân Đồn",
            "Vĩnh Hội",
            "Vĩnh Khánh",
            "Vĩnh Lộc",
            "Vĩnh Nam",
            "Vĩnh Viễn",
            "Võ Duy Ninh",
            "Võ Thành Trang",
            "Võ Thị Sáu",
            "Võ Trứ",
            "Võ Trường Toản",
            "Võ Văn Kiệt",
            "Võ Văn Ngân",
            "Võ Văn Tần",
            "Vũ Chí Hiếu",
            "Vũ Đình Long",
            "Vũ Ngọc Phan",
            "Vũ Trọng Phụng",
            "Vũ Tụ",
            "Vũ Tùng",
            "Vườn Chuối",
            "Vườn Lài",
            "Vườn Thơm",
            "Xóm Chỉ",
            "Xóm Chiếu",
            "Xóm Củi",
            "Xóm Đất",
            "Xóm Huế",
            "Xóm Thuốc",
            "Xóm Vôi",
            "Xô Viết Nghệ Tĩnh",
            "Xuân Diệu",
            "Xuân Hồng",
            "Ỷ Lan",
            "Yersin",
            "Yên Thế",
            "Yết Kêu",
            "Số 1",
            "Số 2",
            "Số 3",
            "Số 4",
            "Số 5",
            "Số 6",
            "Số 7",
            "Số 8",
            "Số 9",
            "Số 10",
            "Số 11",
            "Số 12",
            "Số 13",
            "Số 14",
            "Số 15",
            "Số 16",
            "Số 17",
            "Số 18",
            "Số 19",
            "Số 20",
            "Số 21",
            "Số 22",
            "Số 23",
            "Số 24",
            "Số 25",
            "Số 26",
            "Số 27",
            "Số 28",
            "Số 29",
            "Số 30",
            "Số 31",
            "Số 32",
            "Số 33",
            "Số 34",
            "Số 35",
            "Số 36",
            "Số 37",
            "Số 38",
            "Số 39",
            "Số 40",
            "Số 41",
            "Số 42",
            "Số 43",
            "Số 44",
            "Số 45",
            "Số 46",
            "Số 47",
            "Số 48",
            "Số 49",
            "Số 50",
            "Số 51",
            "Số 52",
            "Số 53",
            "Số 54",
            "Số 55",
            "Số 56",
            "Số 57",
            "Số 58",
            "Số 59",
            "Số 60",
            "Số 61",
            "Số 62",
            "Số 63",
            "Số 64",
            "Số 65",
            "Số 66",
            "Số 67",
            "Số 68",
            "Số 69",
            "Số 70",
            "Số 71",
            "Số 72",
            "Số 73",
            "Số 74",
            "Số 75",
            "Số 76",
            "Số 77",
            "Số 78",
            "Số 79",
            "Số 80",
            "Số 81",
            "Số 82",
            "Số 83",
            "Số 84",
            "Số 85",
            "Số 86",
            "Số 87",
            "Số 88",
            "Số 89",
            "Số 90",
            "Số 91",
            "Số 92",
            "Số 93",
            "Số 94",
            "Số 95",
            "Số 96",
            "Số 97",
            "Số 98",
            "Số 99",
            "Số 100",
            "Số 101",
            "Số 102",
            "Số 103",
            "Số 104",
            "Số 105",
            "Số 106",
            "Số 107",
            "Số 108",
            "Số 109",
            "Số 110",
            "Số 111",
            "Số 112",
            "Số 113",
            "Số 114",
            "Số 115",
            "Số 116",
            "Số 117",
            "Số 118",
            "Số 119",
            "Số 120"
        ];
        $("#tags_street").autocomplete({
            source: availableTags_Street
        });
    });
</script>
<script>
    function addOption(selectbox, text, value) {
        var optn = document.createElement("OPTION");
        optn.text = text;
        optn.value = value;
        selectbox.options.add(optn);
    }
    function removeAllOptions(selectbox) {
        var i;
        for (i = selectbox.options.length - 1; i >= 0; i--)
        {
            selectbox.remove(i);
        }
    }

    function city_selected(typeofcity, typeoflist) {
        var list_city = document.getElementById(typeofcity);
        var list_district = document.getElementById(typeoflist);
        removeAllOptions(list_district);
        if (list_city.value === 0) {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
        }
        //TP Ha Noi
        else if (list_city.value === "Hà Nội") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Quận Ba Đình", "Quận Ba Đình");
            addOption(list_district, "Quận Hoàn Kiếm", "Quận Hoàn Kiếm");
            addOption(list_district, "Quận Hai Bà Trưng", "Quận Hai Bà Trưng");
            addOption(list_district, "Quận Đống Đa", "Quận Đống Đa");
            addOption(list_district, "Quận Tây Hồ", "Quận Tây Hồ");
            addOption(list_district, "Quận Cầu Giấy", "Quận Cầu Giấy");
            addOption(list_district, "Quận Thanh Xuân", "Quận Thanh Xuân");
            addOption(list_district, "Quận Hoàng Mai", "Quận Hoàng Mai");
            addOption(list_district, "Quận Long Biên", "Quận Long Biên");
            addOption(list_district, "Huyện Từ Liêm", "Huyện Từ Liêm");
            addOption(list_district, "Huyện Thanh Trì", "Huyện Thanh Trì");
            addOption(list_district, "Huyện Gia Lâm", "Huyện Gia Lâm");
            addOption(list_district, "Huyện Đông Anh", "Huyện Đông Anh");
            addOption(list_district, "Huyện Sóc Sơn", "Huyện Sóc Sơn");
            addOption(list_district, "Quận Hà Đông", "Quận Hà Đông");
            addOption(list_district, "Thị xã Sơn Tây", "Thị xã Sơn Tây");
            addOption(list_district, "Huyện Ba Vì", "Huyện Ba Vì");
            addOption(list_district, "Huyện Phúc Thọ", "Huyện Phúc Thọ");
            addOption(list_district, "Huyện Thạch Thất", "Huyện Thạch Thất");
            addOption(list_district, "Huyện Quốc Oai", "Huyện Quốc Oai");
            addOption(list_district, "Huyện Chương Mỹ", "Huyện Chương Mỹ");
            addOption(list_district, "Huyện Đan Phượng", "Huyện Đan Phượng");
            addOption(list_district, "Huyện Hoài Đức", "Huyện Hoài Đức");
            addOption(list_district, "Huyện Thanh Oai", "Huyện Thanh Oai");
            addOption(list_district, "Huyện Mỹ Đức", "Huyện Mỹ Đức");
            addOption(list_district, "Huyện Ứng Hoà", "Huyện Ứng Hoà");
            addOption(list_district, "Huyện Thường Tín", "Huyện Thường Tín");
            addOption(list_district, "Huyện Phú Xuyên", "Huyện Phú Xuyên");
            addOption(list_district, "Huyện Mê Linh", "Huyện Mê Linh");
        }
        //TP HCM
        else if (list_city.value === "Hồ Chí Minh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Quận 1", "Quận 1");
            addOption(list_district, "Quận 2", "Quận 2");
            addOption(list_district, "Quận 3", "Quận 3");
            addOption(list_district, "Quận 4", "Quận 4");
            addOption(list_district, "Quận 5", "Quận 5");
            addOption(list_district, "Quận 6", "Quận 6");
            addOption(list_district, "Quận 7", "Quận 7");
            addOption(list_district, "Quận 8", "Quận 8");
            addOption(list_district, "Quận 9", "Quận 9");
            addOption(list_district, "Quận 10", "Quận 10");
            addOption(list_district, "Quận 11", "Quận 11");
            addOption(list_district, "Quận 12", "Quận 12");
            addOption(list_district, "Quận Thủ Đức", "Quận Thủ Đức");
            addOption(list_district, "Quận Gò Vấp", "Quận Gò Vấp");
            addOption(list_district, "Quận Bình Thạnh", "Quận Bình Thạnh");
            addOption(list_district, "Quận Tân Bình", "Quận Tân Bình");
            addOption(list_district, "Quận Tân Phú", "Quận Tân Phú");
            addOption(list_district, "Quận Phú Nhuận", "Quận Phú Nhuận");
            addOption(list_district, "Quận Bình Tân", "Quận Bình Tân");
            addOption(list_district, "Huyện Củ Chi", "Huyện Củ Chi");
            addOption(list_district, "Huyện Hóc Môn", "Huyện Hóc Môn");
            addOption(list_district, "Huyện Bình Chánh", "Huyện Bình Chánh");
            addOption(list_district, "Huyện Nhà Bè", "Huyện Nhà Bè");
            addOption(list_district, "Huyện Cần Giờ", "Huyện Cần Giờ");
        }
        //Tinh Ha Giang
        else if (list_city.value === "Tỉnh Hà Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hà Giang", "TP. Hà Giang");
            addOption(list_district, "Huyện Đồng Văn", "Huyện Đồng Văn");
            addOption(list_district, "Huyện Mèo Vạc", "Huyện Mèo Vạc");
            addOption(list_district, "Huyện Yên Minh", "Huyện Yên Minh");
            addOption(list_district, "Huyện Quản Bạ", "Huyện Quản Bạ");
            addOption(list_district, "Huyện Vị Xuyên", "Huyện Vị Xuyên");
            addOption(list_district, "Huyện Bắc Mê", "Huyện Bắc Mê");
            addOption(list_district, "Huyện Hoàng Su Phì", "Huyện Hoàng Su Phì");
            addOption(list_district, "Huyện Xín Mần", "Huyện Xín Mần");
            addOption(list_district, "Huyện Bắc Quang", "Huyện Bắc Quang");
            addOption(list_district, "Huyện Quang Bình", "Huyện Quang Bình");
        }
        //Tinh Cao Bang
        else if (list_city.value === "Tỉnh Cao Bằng") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Cao Bằng", "Thị xã Cao Bằng");
            addOption(list_district, "Huyện Bảo Lạc", "Huyện Bảo Lạc");
            addOption(list_district, "Huyện Thông Nông", "Huyện Thông Nông");
            addOption(list_district, "Huyện Hà Quảng", "Huyện Hà Quảng");
            addOption(list_district, "Huyện Trà Lĩnh", "Huyện Trà Lĩnh");
            addOption(list_district, "Huyện Trùng Khánh", "Huyện Trùng Khánh");
            addOption(list_district, "Huyện Nguyên Bình", "Huyện Nguyên Bình");
            addOption(list_district, "Huyện Hoà An", "Huyện Hoà An");
            addOption(list_district, "Huyện Quảng Uyên", "Huyện Quảng Uyên");
            addOption(list_district, "Huyện Thạch An", "Huyện Thạch An");
            addOption(list_district, "Huyện Hạ Lang", "Huyện Hạ Lang");
            addOption(list_district, "Huyện Bảo Lâm", "Huyện Bảo Lâm");
            addOption(list_district, "Huyện Phục Hoà", "Huyện Phục Hoà");
        }
        //Tinh Bac Kan
        else if (list_city.value === "Tỉnh Bắc Kạn") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Bắc Kạn", "Thị xã Bắc Kạn");
            addOption(list_district, "Huyện Chợ Đồn", "Huyện Chợ Đồn");
            addOption(list_district, "Huyện Bạch Thông", "Huyện Bạch Thông");
            addOption(list_district, "Huyện Na Rì", "Huyện Na Rì");
            addOption(list_district, "Huyện Ngân Sơn", "Huyện Ngân Sơn");
            addOption(list_district, "Huyện Ba Bể", "Huyện Ba Bể");
            addOption(list_district, "Huyện Chợ Mới", "Huyện Chợ Mới");
            addOption(list_district, "Huyện Pác Nặm", "Huyện Pác Nặm");
        }
        //Tinh Tuyen Quang
        else if (list_city.value === "Tỉnh Tuyên Quang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Tuyên Quang", "TP. Tuyên Quang");
            addOption(list_district, "Huyện Lâm Bình", "Huyện Lâm Bình");
            addOption(list_district, "Huyện Na Hang", "Huyện Na Hang");
            addOption(list_district, "Huyện Chiêm Hoá", "Huyện Chiêm Hoá");
            addOption(list_district, "Huyện Hàm Yên", "Huyện Hàm Yên");
            addOption(list_district, "Huyện Yên Sơn", "Huyện Yên Sơn");
            addOption(list_district, "Huyện Sơn Dương", "Huyện Sơn Dương");
        }
        //Tinh LaoCai
        else if (list_city.value === "Tỉnh Lào Cai") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Lào Cai", "TP. Lào Cai");
            addOption(list_district, "Huyện Xi Ma Cai", "Huyện Xi Ma Cai");
            addOption(list_district, "Huyện Bát Xát", "Huyện Bát Xát");
            addOption(list_district, "Huyện Bảo Thắng", "Huyện Bảo Thắng");
            addOption(list_district, "Huyện Sa Pa", "Huyện Sa Pa");
            addOption(list_district, "Huyện Văn Bàn", "Huyện Văn Bàn");
            addOption(list_district, "Huyện Bảo Yên", "Huyện Bảo Yên");
            addOption(list_district, "Huyện Bắc Hà", "Huyện Bắc Hà");
            addOption(list_district, "Huyện Mường Khương", "Huyện Mường Khương");
        }
        //Tinh Dien Bien
        else if (list_city.value === "Tỉnh Điện Biên") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Điện Biên Phủ", "TP. Điện Biên Phủ");
            addOption(list_district, "Thị xã Mường Lay", "Thị xã Mường Lay");
            addOption(list_district, "Huyện Điện Biên", "Huyện Điện Biên");
            addOption(list_district, "Huyện Tuần Giáo", "Huyện Tuần Giáo");
            addOption(list_district, "Huyện Mường Chà", "Huyện Mường Chà");
            addOption(list_district, "Huyện Tủa Chùa", "Huyện Tủa Chùa");
            addOption(list_district, "Huyện Điện Biên Đông", "Huyện Điện Biên Đông");
            addOption(list_district, "Huyện Mường Nhé", "Huyện Mường Nhé");
            addOption(list_district, "Huyện Mường Ảng", "Huyện Mường Ảng");
        }
        //Tinh LaiChau
        else if (list_city.value === "Tỉnh Lai Châu") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Lai Châu", "Thị xã Lai Châu");
            addOption(list_district, "Huyện Tam Đường", "Huyện Tam Đường");
            addOption(list_district, "Huyện Phong Thổ", "Huyện Phong Thổ");
            addOption(list_district, "Huyện Sìn Hồ", "Huyện Sìn Hồ");
            addOption(list_district, "Huyện Mường Tè", "Huyện Mường Tè");
            addOption(list_district, "Huyện Than Uyên", "Huyện Than Uyên");
            addOption(list_district, "Huyện Tân Uyên", "Huyện Tân Uyên");
            addOption(list_district, "Huyện Nậm Nhùn", "Huyện Nậm Nhùn");
        }
        //Tinh Son La
        else if (list_city.value === "Tỉnh Sơn La") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Sơn La", "TP. Sơn La");
            addOption(list_district, "Huyện Quỳnh Nhai", "Huyện Quỳnh Nhai");
            addOption(list_district, "Huyện Mường La", "Huyện Mường La");
            addOption(list_district, "Huyện Thuận Châu", "Huyện Thuận Châu");
            addOption(list_district, "Huyện Bắc Yên", "Huyện Bắc Yên");
            addOption(list_district, "Huyện Phù Yên", "Huyện Phù Yên");
            addOption(list_district, "Huyện Mai Sơn", "Huyện Mai Sơn");
            addOption(list_district, "Huyện Yên Châu", "Huyện Yên Châu");
            addOption(list_district, "Huyện Sông Mã", "Huyện Sông Mã");
            addOption(list_district, "Huyện Mộc Châu", "Huyện Mộc Châu");
            addOption(list_district, "Huyện Sốp Cộp", "Huyện Sốp Cộp");
        }
        //Tinh Yen Bai
        else if (list_city.value === "Tỉnh Yên Bái") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Yên Bái", "TP. Yên Bái");
            addOption(list_district, "Thị xã Nghĩa Lộ", "Thị xã Nghĩa Lộ");
            addOption(list_district, "Huyện Văn Yên", "Huyện Văn Yên");
            addOption(list_district, "Huyện Yên Bình", "Huyện Yên Bình");
            addOption(list_district, "Huyện Mù Cang Chải", "Huyện Mù Cang Chải");
            addOption(list_district, "Huyện Văn Chấn", "Huyện Văn Chấn");
            addOption(list_district, "Huyện Trấn Yên", "Huyện Trấn Yên");
            addOption(list_district, "Huyện Trạm Tấu", "Huyện Trạm Tấu");
            addOption(list_district, "Huyện Lục Yên", "Huyện Lục Yên");
        }
        //Tinh Hoa Binh
        else if (list_city.value === "Tỉnh Hoà Bình") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hoà Bình", "TP. Hoà Bình");
            addOption(list_district, "Huyện Đà Bắc", "Huyện Đà Bắc");
            addOption(list_district, "Huyện Mai Châu", "Huyện Mai Châu");
            addOption(list_district, "Huyện Tân Lạc", "Huyện Tân Lạc");
            addOption(list_district, "Huyện Lạc Sơn", "Huyện Lạc Sơn");
            addOption(list_district, "Huyện Kỳ Sơn", "Huyện Kỳ Sơn");
            addOption(list_district, "Huyện Lương Sơn", "Huyện Lương Sơn");
            addOption(list_district, "Huyện Kim Bôi", "Huyện Kim Bôi");
            addOption(list_district, "Huyện Lạc Thuỷ", "Huyện Lạc Thuỷ");
            addOption(list_district, "Huyện Yên Thuỷ", "Huyện Yên Thuỷ");
            addOption(list_district, "Huyện Cao Phong", "Huyện Cao Phong");
        }
        //Tinh Thai Nguyen
        else if (list_city.value === "Tỉnh Thái Nguyên") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Thái Nguyên", "TP. Thái Nguyên");
            addOption(list_district, "Thị xã Sông Công", "Thị xã Sông Công");
            addOption(list_district, "Huyện Định Hoá", "Huyện Định Hoá");
            addOption(list_district, "Huyện Phú Lương", "Huyện Phú Lương");
            addOption(list_district, "Huyện Võ Nhai", "Huyện Võ Nhai");
            addOption(list_district, "Huyện Đại Từ", "Huyện Đại Từ");
            addOption(list_district, "Huyện Đồng Hỷ", "Huyện Đồng Hỷ");
            addOption(list_district, "Huyện Phú Bình", "Huyện Phú Bình");
            addOption(list_district, "Huyện Phổ Yên", "Huyện Phổ Yên");
        }
        //Tinh Lang Son
        else if (list_city.value === "Tỉnh Lạng Sơn") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Lạng Sơn", "TP. Lạng Sơn");
            addOption(list_district, "Huyện Tràng Định", "Huyện Tràng Định");
            addOption(list_district, "Huyện Bình Gia", "Huyện Bình Gia");
            addOption(list_district, "Huyện Văn Lãng", "Huyện Văn Lãng");
            addOption(list_district, "Huyện Bắc Sơn", "Huyện Bắc Sơn");
            addOption(list_district, "Huyện Văn Quan", "Huyện Văn Quan");
            addOption(list_district, "Huyện Cao Lộc", "Huyện Cao Lộc");
            addOption(list_district, "Huyện Lộc Bình", "Huyện Lộc Bình");
            addOption(list_district, "Huyện Chi Lăng", "Huyện Chi Lăng");
            addOption(list_district, "Huyện Đình Lập", "Huyện Đình Lập");
            addOption(list_district, "Huyện Hữu Lũng", "Huyện Hữu Lũng");
        }
        //Tinh Quang Ninh
        else if (list_city.value === "Tỉnh Quảng Ninh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hạ Long", "TP. Hạ Long");
            addOption(list_district, "TP. Cẩm Phả", "TP. Cẩm Phả");
            addOption(list_district, "TP. Uông Bí", "TP. Uông Bí");
            addOption(list_district, "TP. Móng Cái", "TP. Móng Cái");
            addOption(list_district, "Huyện Bình Liêu", "Huyện Bình Liêu");
            addOption(list_district, "Huyện Đầm Hà", "Huyện Đầm Hà");
            addOption(list_district, "Huyện Hải Hà", "Huyện Hải Hà");
            addOption(list_district, "Huyện Tiên Yên", "Huyện Tiên Yên");
            addOption(list_district, "Huyện Ba Chẽ", "Huyện Ba Chẽ");
            addOption(list_district, "Huyện Đông Triều", "Huyện Đông Triều");
            addOption(list_district, "Huyện Yên Hưng", "Huyện Yên Hưng");
            addOption(list_district, "Huyện Hoành Bồ", "Huyện Hoành Bồ");
            addOption(list_district, "Huyện Vân Đồn", "Huyện Vân Đồn");
            addOption(list_district, "Huyện Cô Tô", "Huyện Cô Tô");
        }
        //Tinh Bac Giang
        else if (list_city.value === "Tỉnh Bắc Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Bắc Giang", "TP. Bắc Giang");
            addOption(list_district, "Huyện Yên Thế", "Huyện Yên Thế");
            addOption(list_district, "Huyện Lục Ngạn", "Huyện Lục Ngạn");
            addOption(list_district, "Huyện Sơn Động", "Huyện Sơn Động");
            addOption(list_district, "Huyện Lục Nam", "Huyện Lục Nam");
            addOption(list_district, "Huyện Tân Yên", "Huyện Tân Yên");
            addOption(list_district, "Huyện Hiệp Hoà", "Huyện Hiệp Hoà");
            addOption(list_district, "Huyện Lạng Giang", "Huyện Lạng Giang");
            addOption(list_district, "Huyện Việt Yên", "Huyện Việt Yên");
            addOption(list_district, "Huyện Yên Dũng", "Huyện Yên Dũng");
        }
        //Tinh Phu Tho
        else if (list_city.value === "Tỉnh Phú Thọ") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Việt Trì", "TP. Việt Trì");
            addOption(list_district, "Thị xã Phú Thọ", "Thị xã Phú Thọ");
            addOption(list_district, "Huyện Đoan Hùng", "Huyện Đoan Hùng");
            addOption(list_district, "Huyện Thanh Ba", "Huyện Thanh Ba");
            addOption(list_district, "Huyện Hạ Hoà", "Huyện Hạ Hoà");
            addOption(list_district, "Huyện Cẩm Khê", "Huyện Cẩm Khê");
            addOption(list_district, "Huyện Yên Lập", "Huyện Yên Lập");
            addOption(list_district, "Huyện Thanh Sơn", "Huyện Thanh Sơn");
            addOption(list_district, "Huyện Phù Ninh", "Huyện Phù Ninh");
            addOption(list_district, "Huyện Lâm Thao", "Huyện Lâm Thao");
            addOption(list_district, "Huyện Tam Nông", "Huyện Tam Nông");
            addOption(list_district, "Huyện Thanh Thủy", "Huyện Thanh Thủy");
            addOption(list_district, "Huyện Tân Sơn", "Huyện Tân Sơn");
        }
        //Tinh Vinh Phuc
        else if (list_city.value === "Tỉnh Vĩnh Phúc") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Vĩnh Yên", "TP. Vĩnh Yên");
            addOption(list_district, "Huyện Tam Dương", "Huyện Tam Dương");
            addOption(list_district, "Huyện Lập Thạch", "Huyện Lập Thạch");
            addOption(list_district, "Huyện Vĩnh Tường", "Huyện Vĩnh Tường");
            addOption(list_district, "Huyện Yên Lạc", "Huyện Yên Lạc");
            addOption(list_district, "Huyện Bình Xuyên", "Huyện Bình Xuyên");
            addOption(list_district, "Huyện Sông Lô", "Huyện Sông Lô");
            addOption(list_district, "Thị xã Phúc Yên", "Thị xã Phúc Yên");
            addOption(list_district, "Huyện Tam Đảo", "Huyện Tam Đảo");
        }
        //Tinh Bac Ninh
        else if (list_city.value === "Tỉnh Bắc Ninh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Bắc Ninh", "TP. Bắc Ninh");
            addOption(list_district, "Huyện Yên Phong", "Huyện Yên Phong");
            addOption(list_district, "Huyện Quế Võ", "Huyện Quế Võ");
            addOption(list_district, "Huyện Tiên Du", "Huyện Tiên Du");
            addOption(list_district, "Thị xã Từ Sơn", "Thị xã Từ Sơn");
            addOption(list_district, "Huyện Thuận Thành", "Huyện Thuận Thành");
            addOption(list_district, "Huyện Gia Bình", "Huyện Gia Bình");
            addOption(list_district, "Huyện Lương Tài", "Huyện Lương Tài");
        }
        //Tinh Hai Duong
        else if (list_city.value === "Tỉnh Hải Dương") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hải Dương", "TP. Hải Dương");
            addOption(list_district, "Thị xã Chí Linh", "Thị xã Chí Linh");
            addOption(list_district, "Huyện Nam Sách", "Huyện Nam Sách");
            addOption(list_district, "Huyện Kinh Môn", "Huyện Kinh Môn");
            addOption(list_district, "Huyện Gia Lộc", "Huyện Gia Lộc");
            addOption(list_district, "Huyện Tứ Kỳ", "Huyện Tứ Kỳ");
            addOption(list_district, "Huyện Thanh Miện", "Huyện Thanh Miện");
            addOption(list_district, "Huyện Ninh Giang", "Huyện Ninh Giang");
            addOption(list_district, "Huyện Cẩm Giàng", "Huyện Cẩm Giàng");
            addOption(list_district, "Huyện Thanh Hà", "Huyện Thanh Hà");
            addOption(list_district, "Huyện Kim Thành", "Huyện Kim Thành");
            addOption(list_district, "Huyện Bình Giang", "Huyện Bình Giang");
        }
        //TP Hai Phong
        else if (list_city.value === "Thành phố Hải Phòng")
        {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Quận Hồng Bàng", "Quận Hồng Bàng");
            addOption(list_district, "Quận Lê Chân", "Quận Lê Chân");
            addOption(list_district, "Quận Ngô Quyền", "Quận Ngô Quyền");
            addOption(list_district, "Quận Kiến An", "Quận Kiến An");
            addOption(list_district, "Quận Hải An", "Quận Hải An");
            addOption(list_district, "Quận Đồ Sơn", "Quận Đồ Sơn");
            addOption(list_district, "Huyện An Lão", "Huyện An Lão");
            addOption(list_district, "Huyện Kiến Thụy", "Huyện Kiến Thụy");
            addOption(list_district, "Huyện Thủy Nguyên", "Huyện Thủy Nguyên");
            addOption(list_district, "Huyện An Dương", "Huyện An Dương");
            addOption(list_district, "Huyện Tiên Lãng", "Huyện Tiên Lãng");
            addOption(list_district, "Huyện Vĩnh Bảo", "Huyện Vĩnh Bảo");
            addOption(list_district, "Huyện Cát Hải", "Huyện Cát Hải");
            addOption(list_district, "Huyện Bạch Long Vĩ", "Huyện Bạch Long Vĩ");
            addOption(list_district, "Quận Dương Kinh", "Quận Dương Kinh");
        }
        //Tinh Hung Yen
        else if (list_city.value === "Tỉnh Hưng Yên") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hưng Yên", "TP. Hưng Yên");
            addOption(list_district, "Huyện Kim Động", "Huyện Kim Động");
            addOption(list_district, "Huyện Ân Thi", "Huyện Ân Thi");
            addOption(list_district, "Huyện Khoái Châu", "Huyện Khoái Châu");
            addOption(list_district, "Huyện Yên Mỹ", "Huyện Yên Mỹ");
            addOption(list_district, "Huyện Tiên Lữ", "Huyện Tiên Lữ");
            addOption(list_district, "Huyện Phù Cừ", "Huyện Phù Cừ");
            addOption(list_district, "Huyện Mỹ Hào", "Huyện Mỹ Hào");
            addOption(list_district, "Huyện Văn Lâm", "Huyện Văn Lâm");
            addOption(list_district, "Huyện Văn Giang", "Huyện Văn Giang");
        }
        //Tinh Thai Binh
        else if (list_city.value === "Tỉnh Thái Bình") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Thái Bình", "TP. Thái Bình");
            addOption(list_district, "Huyện Quỳnh Phụ", "Huyện Quỳnh Phụ");
            addOption(list_district, "Huyện Hưng Hà", "Huyện Hưng Hà");
            addOption(list_district, "Huyện Đông Hưng", "Huyện Đông Hưng");
            addOption(list_district, "Huyện Vũ Thư", "Huyện Vũ Thư");
            addOption(list_district, "Huyện Kiến Xương", "Huyện Kiến Xương");
            addOption(list_district, "Huyện Tiền Hải", "Huyện Tiền Hải");
            addOption(list_district, "Huyện Thái Thuỵ", "Huyện Thái Thuỵ");
        }
        //Tinh Ha Nam
        else if (list_city.value === "Tỉnh Hà Nam") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Phủ Lý", "TP. Phủ Lý");
            addOption(list_district, "Huyện Duy Tiên", "Huyện Duy Tiên");
            addOption(list_district, "Huyện Kim Bảng", "Huyện Kim Bảng");
            addOption(list_district, "Huyện Lý Nhân", "Huyện Lý Nhân");
            addOption(list_district, "Huyện Thanh Liêm", "Huyện Thanh Liêm");
            addOption(list_district, "Huyện Bình Lục", "Huyện Bình Lục");
        }
        //Tinh Nam Dinh
        else if (list_city.value === "Tỉnh Nam Định") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Nam Định", "TP. Nam Định");
            addOption(list_district, "Huyện Mỹ Lộc", "Huyện Mỹ Lộc");
            addOption(list_district, "Huyện Xuân Trường", "Huyện Xuân Trường");
            addOption(list_district, "Huyện Giao Thủy", "Huyện Giao Thủy");
            addOption(list_district, "Huyện Ý Yên", "Huyện Ý Yên");
            addOption(list_district, "Huyện Vụ Bản", "Huyện Vụ Bản");
            addOption(list_district, "Huyện Nam Trực", "Huyện Nam Trực");
            addOption(list_district, "Huyện Trực Ninh", "Huyện Trực Ninh");
            addOption(list_district, "Huyện Nghĩa Hưng", "Huyện Nghĩa Hưng");
            addOption(list_district, "Huyện Hải Hậu", "Huyện Hải Hậu");
        }
        //Tinh Ninh Binh
        else if (list_city.value === "Tỉnh Ninh Bình") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Ninh Bình", "TP. Ninh Bình");
            addOption(list_district, "Thị xã Tam Điệp", "Thị xã Tam Điệp");
            addOption(list_district, "Huyện Nho Quan", "Huyện Nho Quan");
            addOption(list_district, "Huyện Gia Viễn", "Huyện Gia Viễn");
            addOption(list_district, "Huyện Hoa Lư", "Huyện Hoa Lư");
            addOption(list_district, "Huyện Yên Mô", "Huyện Yên Mô");
            addOption(list_district, "Huyện Kim Sơn", "Huyện Kim Sơn");
            addOption(list_district, "Huyện Yên Khánh", "Huyện Yên Khánh");
        }
        //Tinh Thanh Hoa
        else if (list_city.value === "Tỉnh Thanh Hoá") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Thanh Hoá", "TP. Thanh Hoá");
            addOption(list_district, "Thị xã Bỉm Sơn", "Thị xã Bỉm Sơn");
            addOption(list_district, "Thị xã Sầm Sơn", "Thị xã Sầm Sơn");
            addOption(list_district, "Huyện Quan Hoá", "Huyện Quan Hoá");
            addOption(list_district, "Huyện Quan Sơn", "Huyện Quan Sơn");
            addOption(list_district, "Huyện Mường Lát", "Huyện Mường Lát");
            addOption(list_district, "Huyện Bá Thước", "Huyện Bá Thước");
            addOption(list_district, "Huyện Thường Xuân", "Huyện Thường Xuân");
            addOption(list_district, "Huyện Như Xuân", "Huyện Như Xuân");
            addOption(list_district, "Huyện Như Thanh", "Huyện Như Thanh");
            addOption(list_district, "Huyện Lang Chánh", "Huyện Lang Chánh");
            addOption(list_district, "Huyện Ngọc Lặc", "Huyện Ngọc Lặc");
            addOption(list_district, "Huyện Thạch Thành", "Huyện Thạch Thành");
            addOption(list_district, "Huyện Cẩm Thủy", "Huyện Cẩm Thủy");
            addOption(list_district, "Huyện Thọ Xuân", "Huyện Thọ Xuân");
            addOption(list_district, "Huyện Vĩnh Lộc", "Huyện Vĩnh Lộc");
            addOption(list_district, "Huyện Thiệu Hoá", "Huyện Thiệu Hoá");
            addOption(list_district, "Huyện Triệu Sơn", "Huyện Triệu Sơn");
            addOption(list_district, "Huyện Nông Cống", "Huyện Nông Cống");
            addOption(list_district, "Huyện Đông Sơn", "Huyện Đông Sơn");
            addOption(list_district, "Huyện Hà Trung", "Huyện Hà Trung");
            addOption(list_district, "Huyện Hoằng Hoá", "Huyện Hoằng Hoá");
            addOption(list_district, "Huyện Nga Sơn", "Huyện Nga Sơn");
            addOption(list_district, "Huyện Hậu Lộc", "Huyện Hậu Lộc");
            addOption(list_district, "Huyện Quảng Xương", "Huyện Quảng Xương");
            addOption(list_district, "Huyện Tĩnh Gia", "Huyện Tĩnh Gia");
            addOption(list_district, "Huyện Yên Định", "Huyện Yên Định");
        }
        //Tinh Nghe An                 
        else if (list_city.value === "Tỉnh Nghệ An") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Vinh", "TP. Vinh");
            addOption(list_district, "Thị xã Cửa Lò", "Thị xã Cửa Lò");
            addOption(list_district, "Huyện Quỳ Châu", "Huyện Quỳ Châu");
            addOption(list_district, "Huyện Quỳ Hợp", "Huyện Quỳ Hợp");
            addOption(list_district, "Huyện Nghĩa Đàn", "Huyện Nghĩa Đàn");
            addOption(list_district, "Huyện Quỳnh Lưu", "Huyện Quỳnh Lưu");
            addOption(list_district, "Huyện Kỳ Sơn", "Huyện Kỳ Sơn");
            addOption(list_district, "Huyện Tương Dương", "Huyện Tương Dương");
            addOption(list_district, "Huyện Con Cuông", "Huyện Con Cuông");
            addOption(list_district, "Huyện Tân Kỳ", "Huyện Tân Kỳ");
            addOption(list_district, "Huyện Yên Thành", "Huyện Yên Thành");
            addOption(list_district, "Huyện Diễn Châu", "Huyện Diễn Châu");
            addOption(list_district, "Huyện Anh Sơn", "Huyện Anh Sơn");
            addOption(list_district, "Huyện Đô Lương", "Huyện Đô Lương");
            addOption(list_district, "Huyện Thanh Chương", "Huyện Thanh Chương");
            addOption(list_district, "Huyện Nghi Lộc", "Huyện Nghi Lộc");
            addOption(list_district, "Huyện Nam Đàn", "Huyện Nam Đàn");
            addOption(list_district, "Huyện Hưng Nguyên", "Huyện Hưng Nguyên");
            addOption(list_district, "Huyện Quế Phong", "Huyện Quế Phong");
            addOption(list_district, "Thị xã Thái Hòa", "Thị xã Thái Hòa");
        }
        //Tinh Ha Tinh
        else if (list_city.value === "Tỉnh Hà Tĩnh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hà Tĩnh", "TP. Hà Tĩnh");
            addOption(list_district, "Thị xã Hồng Lĩnh", "Thị xã Hồng Lĩnh");
            addOption(list_district, "Huyện Hương Sơn", "Huyện Hương Sơn");
            addOption(list_district, "Huyện Đức Thọ", "Huyện Đức Thọ");
            addOption(list_district, "Huyện Nghi Xuân", "Huyện Nghi Xuân");
            addOption(list_district, "Huyện Can Lộc", "Huyện Can Lộc");
            addOption(list_district, "Huyện Hương Khê", "Huyện Hương Khê");
            addOption(list_district, "Huyện Thạch Hà", "Huyện Thạch Hà");
            addOption(list_district, "Huyện Cẩm Xuyên", "Huyện Cẩm Xuyên");
            addOption(list_district, "Huyện Kỳ Anh", "Huyện Kỳ Anh");
            addOption(list_district, "Huyện Vũ Quang", "Huyện Vũ Quang");
            addOption(list_district, "Huyện Lộc Hà", "Huyện Lộc Hà");
        }
        //Tinh Quang Binh
        else if (list_city.value === "Tỉnh Quảng Bình") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Đồng Hới", "TP. Đồng Hới");
            addOption(list_district, "Huyện Tuyên Hoá", "Huyện Tuyên Hoá");
            addOption(list_district, "Huyện Minh Hoá", "Huyện Minh Hoá");
            addOption(list_district, "Huyện Quảng Trạch", "Huyện Quảng Trạch");
            addOption(list_district, "Huyện Bố Trạch", "Huyện Bố Trạch");
            addOption(list_district, "Huyện Quảng Ninh", "Huyện Quảng Ninh");
            addOption(list_district, "Huyện Lệ Thuỷ", "Huyện Lệ Thuỷ");
        }
        //Tinh Quang Tri
        else if (list_city.value === "Tỉnh Quảng Trị")
        {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Đông Hà", "TP. Đông Hà");
            addOption(list_district, "Thị xã Quảng Trị", "Thị xã Quảng Trị");
            addOption(list_district, "Huyện Vĩnh Linh", "Huyện Vĩnh Linh");
            addOption(list_district, "Huyện Gio Linh", "Huyện Gio Linh");
            addOption(list_district, "Huyện Cam Lộ", "Huyện Cam Lộ");
            addOption(list_district, "Huyện Triệu Phong", "Huyện Triệu Phong");
            addOption(list_district, "Huyện Hải Lăng", "Huyện Hải Lăng");
            addOption(list_district, "Huyện Hướng Hóa", "Huyện Hướng Hóa");
            addOption(list_district, "Huyện Đăk Rông", "Huyện Đăk Rông");
            addOption(list_district, "Huyện đảo Cồn Cỏ", "Huyện đảo Cồn Cỏ");
        }
        //Tinh Thua Thien Hue
        else if (list_city.value === "Tỉnh Thừa Thiên Huế") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Huế", "TP. Huế");
            addOption(list_district, "Huyện Phong Điền", "Huyện Phong Điền");
            addOption(list_district, "Huyện Quảng Điền", "Huyện Quảng Điền");
            addOption(list_district, "Huyện Hương Trà", "Huyện Hương Trà");
            addOption(list_district, "Huyện Phú Vang", "Huyện Phú Vang");
            addOption(list_district, "Huyện Hương Thủy", "Huyện Hương Thủy");
            addOption(list_district, "Huyện Phú Lộc", "Huyện Phú Lộc");
            addOption(list_district, "Huyện Nam Đông", "Huyện Nam Đông");
            addOption(list_district, "Huyện A Lưới", "Huyện A Lưới");
        }
        //Thanh Pho Da Nang
        else if (list_city.value === "Thành phố Đà Nẵng") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Quận Hải Châu", "Quận Hải Châu");
            addOption(list_district, "Quận Thanh Khê", "Quận Thanh Khê");
            addOption(list_district, "Quận Sơn Trà", "Quận Sơn Trà");
            addOption(list_district, "Quận Ngũ Hành Sơn", "Quận Ngũ Hành Sơn");
            addOption(list_district, "Quận Liên Chiểu", "Quận Liên Chiểu");
            addOption(list_district, "Huyện Hoà Vang", "Huyện Hoà Vang");
            addOption(list_district, "Quận Cẩm Lệ", "Quận Cẩm Lệ");
        }
        //Tinh Quang Nam
        else if (list_city.value === "Tỉnh Quảng Nam") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Tam Kỳ", "TP. Tam Kỳ");
            addOption(list_district, "TP. Hội An", "TP. Hội An");
            addOption(list_district, "Huyện Nông Sơn", "Huyện Nông Sơn");
            addOption(list_district, "Huyện Duy Xuyên", "Huyện Duy Xuyên");
            addOption(list_district, "Huyện Điện Bàn", "Huyện Điện Bàn");
            addOption(list_district, "Huyện Đại Lộc", "Huyện Đại Lộc");
            addOption(list_district, "Huyện Quế Sơn", "Huyện Quế Sơn");
            addOption(list_district, "Huyện Hiệp Đức", "Huyện Hiệp Đức");
            addOption(list_district, "Huyện Thăng Bình", "Huyện Thăng Bình");
            addOption(list_district, "Huyện Núi Thành", "Huyện Núi Thành");
            addOption(list_district, "Huyện Tiên Phước", "Huyện Tiên Phước");
            addOption(list_district, "Huyện Bắc Trà My", "Huyện Bắc Trà My");
            addOption(list_district, "Huyện Đông Giang", "Huyện Đông Giang");
            addOption(list_district, "Huyện Nam Giang", "Huyện Nam Giang");
            addOption(list_district, "Huyện Phước Sơn", "Huyện Phước Sơn");
            addOption(list_district, "Huyện Nam Trà My", "Huyện Nam Trà My");
            addOption(list_district, "Huyện Tây Giang", "Huyện Tây Giang");
            addOption(list_district, "Huyện Phú Ninh", "Huyện Phú Ninh");
            addOption(list_district, "Huyện Nông Sơn", "Huyện Nông Sơn");
        }
        //Tinh Quang Ngai
        else if (list_city.value === "Tỉnh Quảng Ngãi") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Quảng Ngãi", "TP. Quảng Ngãi");
            addOption(list_district, "Huyện Lý Sơn", "Huyện Lý Sơn");
            addOption(list_district, "Huyện Bình Sơn", "Huyện Bình Sơn");
            addOption(list_district, "Huyện Trà Bồng", "Huyện Trà Bồng");
            addOption(list_district, "Huyện Sơn Tịnh", "Huyện Sơn Tịnh");
            addOption(list_district, "Huyện Sơn Hà", "Huyện Sơn Hà");
            addOption(list_district, "Huyện Tư Nghĩa", "Huyện Tư Nghĩa");
            addOption(list_district, "Huyện Nghĩa Hành", "Huyện Nghĩa Hành");
            addOption(list_district, "Huyện Minh Long", "Huyện Minh Long");
            addOption(list_district, "Huyện Mộ Đức", "Huyện Mộ Đức");
            addOption(list_district, "Huyện Đức Phổ", "Huyện Đức Phổ");
            addOption(list_district, "Huyện Ba Tơ", "Huyện Ba Tơ");
            addOption(list_district, "Huyện Sơn Tây", "Huyện Sơn Tây");
            addOption(list_district, "Huyện Tây Trà", "Huyện Tây Trà");
        }
        //Tinh Binh Dinh
        else if (list_city.value === "Tỉnh Bình Định")
        {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Quy Nhơn", "TP. Quy Nhơn");
            addOption(list_district, "Huyện An Lão", "Huyện An Lão");
            addOption(list_district, "Huyện Hoài Ân", "Huyện Hoài Ân");
            addOption(list_district, "Huyện Hoài Nhơn", "Huyện Hoài Nhơn");
            addOption(list_district, "Huyện Phù Mỹ", "Huyện Phù Mỹ");
            addOption(list_district, "Huyện Phù Cát", "Huyện Phù Cát");
            addOption(list_district, "Huyện Vĩnh Thạnh", "Huyện Vĩnh Thạnh");
            addOption(list_district, "Huyện Tây Sơn", "Huyện Tây Sơn");
            addOption(list_district, "Huyện Vân Canh", "Huyện Vân Canh");
            addOption(list_district, "Huyện An Nhơn", "Huyện An Nhơn");
            addOption(list_district, "Huyện Tuy Phước", "Huyện Tuy Phước");
        }
        //Tinh Phu Yen
        else if (list_city.value === "Tỉnh Phú Yên") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Tuy Hoà", "TP. Tuy Hoà");
            addOption(list_district, "Huyện Đồng Xuân", "Huyện Đồng Xuân");
            addOption(list_district, "Thị xã Sông Cầu", "Thị xã Sông Cầu");
            addOption(list_district, "Huyện Tuy An", "Huyện Tuy An");
            addOption(list_district, "Huyện Sơn Hoà", "Huyện Sơn Hoà");
            addOption(list_district, "Huyện Sông Hinh", "Huyện Sông Hinh");
            addOption(list_district, "Huyện Đông Hoà", "Huyện Đông Hoà");
            addOption(list_district, "Huyện Phú Hoà", "Huyện Phú Hoà");
            addOption(list_district, "Huyện Tây Hoà", "Huyện Tây Hoà");
        }
        //Tinh Khanh Hoa
        else if (list_city.value === "Tỉnh Khánh Hoà") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Nha Trang", "TP. Nha Trang");
            addOption(list_district, "Huyện Vạn Ninh", "Huyện Vạn Ninh");
            addOption(list_district, "Huyện Ninh Hoà", "Huyện Ninh Hoà");
            addOption(list_district, "Huyện Diên Khánh", "Huyện Diên Khánh");
            addOption(list_district, "Huyện Khánh Vĩnh", "Huyện Khánh Vĩnh");
            addOption(list_district, "Thị xã Cam Ranh", "Thị xã Cam Ranh");
            addOption(list_district, "Huyện Khánh Sơn", "Huyện Khánh Sơn");
            addOption(list_district, "Huyện đảo Trường Sa", "Huyện đảo Trường Sa");
            addOption(list_district, "Huyện Cam Lâm", "Huyện Cam Lâm");
        }
        //Tinh Ninh Thuan
        else if (list_city.value === "Tỉnh Ninh Thuận") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Phan Rang -Tháp Chàm", "TP. Phan Rang -Tháp Chàm");
            addOption(list_district, "Huyện Ninh Sơn", "Huyện Ninh Sơn");
            addOption(list_district, "Huyện Ninh Hải", "Huyện Ninh Hải");
            addOption(list_district, "Huyện Ninh Phước", "Huyện Ninh Phước");
            addOption(list_district, "Huyện Bác Ái", "Huyện Bác Ái");
            addOption(list_district, "Huyện Thuận Bắc", "Huyện Thuận Bắc");
            addOption(list_district, "Huyện Thuận Nam", "Huyện Thuận Nam");
        }
        //Tinh Binh Thuan
        else if (list_city.value === "Tỉnh Bình Thuận") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Phan Thiết", "TP. Phan Thiết");
            addOption(list_district, "Huyện Tuy Phong", "Huyện Tuy Phong");
            addOption(list_district, "Huyện Bắc Bình", "uyện Bắc Bình");
            addOption(list_district, "H. Hàm Thuận Bắc", "H. Hàm Thuận Bắc");
            addOption(list_district, "H. Hàm Thuận Nam", "H. Hàm Thuận Nam");
            addOption(list_district, "Huyện Hàm Tân", "Huyện Hàm Tân");
            addOption(list_district, "Huyện Đức Linh", "Huyện Đức Linh");
            addOption(list_district, "Huyện Tánh Linh", "Huyện Tánh Linh");
            addOption(list_district, "Huyện đảo Phú Quý", "Huyện đảo Phú Quý");
            addOption(list_district, "Thị xã La Gi", "Thị xã La Gi");
        }
        //Tinh Kon Tum
        else if (list_city.value === "Tỉnh Kon Tum") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. KonTum", "TP. KonTum");
            addOption(list_district, "Huyện Đăk Glei", "Huyện Đăk Glei");
            addOption(list_district, "Huyện Ngọc Hồi", "Huyện Ngọc Hồi");
            addOption(list_district, "Huyện Đăk Tô", "Huyện Đăk Tô");
            addOption(list_district, "Huyện Sa Thầy", "Huyện Sa Thầy");
            addOption(list_district, "Huyện Kon Plong", "Huyện Kon Plong");
            addOption(list_district, "Huyện Đăk Hà", "Huyện Đăk Hà");
            addOption(list_district, "Huyện Kon Rẫy", "Huyện Kon Rẫy");
            addOption(list_district, "Huyện Tu Mơ Rông", "Huyện Tu Mơ Rông");
        }
        //Tinh Gia Lai
        else if (list_city.value === "Tỉnh Gia Lai") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Pleiku", "TP. Pleiku");
            addOption(list_district, "Huyện Chư Păh", "Huyện Chư Păh");
            addOption(list_district, "Huyện Mang Yang", "Huyện Mang Yang");
            addOption(list_district, "Huyện Kbang", "Huyện Kbang");
            addOption(list_district, "Thị xã An Khê", "Thị xã An Khê");
            addOption(list_district, "Huyện Kông Chro", "Huyện Kông Chro");
            addOption(list_district, "Huyện Đức Cơ", "Huyện Đức Cơ");
            addOption(list_district, "Huyện Chư Prông", "Huyện Chư Prông");
            addOption(list_district, "Huyện Chư Sê", "Huyện Chư Sê");
            addOption(list_district, "Thị xã Ayunpa", "Thị xã Ayunpa");
            addOption(list_district, "Huyện Krông Pa", "Huyện Krông Pa");
            addOption(list_district, "Huyện Ia Grai", "Huyện Ia Grai");
            addOption(list_district, "Huyện Đăk Đoa", "Huyện Đăk Đoa");
            addOption(list_district, "Huyện Ia Pa", "Huyện Ia Pa");
            addOption(list_district, "Huyện Đăk Pơ", "Huyện Đăk Pơ");
            addOption(list_district, "Huyện Phú Thiện", "Huyện Phú Thiện");
            addOption(list_district, "Huyện Chư Pưh", "Huyện Chư Pưh");
        }
        //Tinh Dak Lak
        else if (list_city.value === "Tỉnh Đắk Lắk") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Buôn Ma Thuột", "TP. Buôn Ma Thuột");
            addOption(list_district, "Huyện Ea H Leo", "Huyện Ea H Leo");
            addOption(list_district, "Huyện Krông Buk", "Huyện Krông Buk");
            addOption(list_district, "Huyện Krông Năng", "Huyện Krông Năng");
            addOption(list_district, "Huyện Ea Súp", "Huyện Ea Súp");
            addOption(list_district, "Huyện Cư M’gar", "Huyện Cư M’gar");
            addOption(list_district, "Huyện Krông Pắc", "Huyện Krông Pắc");
            addOption(list_district, "Huyện Ea Kar", "Huyện Ea Kar");
            addOption(list_district, "Huyện M'Đrăk", "Huyện M'Đrăk");
            addOption(list_district, "Huyện Krông Ana", "Huyện Krông Ana");
            addOption(list_district, "Huyện Krông Bông", "Huyện Krông Bông");
            addOption(list_district, "Huyện Lăk", "Huyện Lăk");
            addOption(list_district, "Huyện Buôn Đôn", "Huyện Buôn Đôn");
            addOption(list_district, "Huyện Cư Kuin", "Huyện Cư Kuin");
            addOption(list_district, "Thị xã Buôn Hồ", "Thị xã Buôn Hồ");
        }
        //Tinh Dak Nong
        else if (list_city.value === "Tỉnh Đắk Nông") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Gia Nghĩa", "Thị xã Gia Nghĩa");
            addOption(list_district, "Huyện Đắk R’Lấp", "Huyện Đắk R’Lấp");
            addOption(list_district, "Huyện Đắk Mil", "Huyện Đắk Mil");
            addOption(list_district, "Huyện Cư Jút", "Huyện Cư Jút");
            addOption(list_district, "Huyện Đắk Song", "Huyện Đắk Song");
            addOption(list_district, "Huyện Krông Nô", "Huyện Krông Nô");
            addOption(list_district, "Huyện Đắk GLong", "Huyện Đắk GLong");
            addOption(list_district, "Huyện Tuy Đức", "Huyện Tuy Đức");
        }
        //Tinh Lam Dong
        else if (list_city.value === "Tỉnh Lâm Đồng") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Đà Lạt", "TP. Đà Lạt");
            addOption(list_district, "Thị xã Bảo Lộc", "Thị xã Bảo Lộc");
            addOption(list_district, "Huyện Đức Trọng", "Huyện Đức Trọng");
            addOption(list_district, "Huyện Di Linh", "Huyện Di Linh");
            addOption(list_district, "Huyện Đơn Dương", "Huyện Đơn Dương");
            addOption(list_district, "Huyện Lạc Dương", "Huyện Lạc Dương");
            addOption(list_district, "Huyện Đạ Huoai", "Huyện Đạ Huoai");
            addOption(list_district, "Huyện Đạ Tẻh", "Huyện Đạ Tẻh");
            addOption(list_district, "Huyện Cát Tiên", "Huyện Cát Tiên");
            addOption(list_district, "Huyện Lâm Hà", "Huyện Lâm Hà");
            addOption(list_district, "Huyện Bảo Lâm", "Huyện Bảo Lâm");
            addOption(list_district, "Huyện Đam Rông", "Huyện Đam Rông");
        }
        //Tinh Binh Phuoc
        else if (list_city.value === "Tỉnh Bình Phước") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Đồng Xoài", "Thị xã Đồng Xoài");
            addOption(list_district, "Huyện Đồng Phú", "Huyện Đồng Phú");
            addOption(list_district, "Huyện Chơn Thành", "Huyện Chơn Thành");
            addOption(list_district, "Huyện Bình Long", "Huyện Bình Long");
            addOption(list_district, "Huyện Lộc Ninh", "Huyện Lộc Ninh");
            addOption(list_district, "Huyện Bù Đốp", "Huyện Bù Đốp");
            addOption(list_district, "Huyện Phước Long", "Huyện Phước Long");
            addOption(list_district, "Huyện Bù Đăng", "Huyện Bù Đăng");
            addOption(list_district, "Huyện Hớn Quản", "Huyện Hớn Quản");
            addOption(list_district, "Huyện Bù Gia Mập", "Huyện Bù Gia Mập");
        }
        //Tinh Tay Ninh
        else if (list_city.value === "Tỉnh Tây Ninh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Tây Ninh", "Thị xã Tây Ninh");
            addOption(list_district, "Huyện Tân Biên", "Huyện Tân Biên");
            addOption(list_district, "Huyện Tân Châu", "Huyện Tân Châu");
            addOption(list_district, "H. Dương Minh Châu", "H. Dương Minh Châu");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Hòa Thành", "Huyện Hòa Thành");
            addOption(list_district, "Huyện Bến Cầu", "Huyện Bến Cầu");
            addOption(list_district, "Huyện Gò Dầu", "Huyện Gò Dầu");
            addOption(list_district, "Huyện Trảng Bàng", "Huyện Trảng Bàng");
        }
        //Tinh Binh Duong
        else if (list_city.value === "Tỉnh Bình Dương") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Thị xã Thủ Dầu Một", "Thị xã Thủ Dầu Một");
            addOption(list_district, "Huyện Bến Cát", "Huyện Bến Cát");
            addOption(list_district, "Huyện Tân Uyên", "Huyện Tân Uyên");
            addOption(list_district, "Huyện Thuận An", "Huyện Thuận An");
            addOption(list_district, "Huyện Dĩ An", "Huyện Dĩ An");
            addOption(list_district, "Huyện Phú Giáo", "Huyện Phú Giáo");
            addOption(list_district, "Huyện Dầu Tiếng", "Huyện Dầu Tiếng");
        }
        //Tinh Dong Nai
        else if (list_city.value === "Tỉnh Đồng Nai") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Biên Hoà", "TP. Biên Hoà");
            addOption(list_district, "Huyện Vĩnh Cửu", "Huyện Vĩnh Cửu");
            addOption(list_district, "Huyện Tân Phú", "Huyện Tân Phú");
            addOption(list_district, "Huyện Định Quán", "Huyện Định Quán");
            addOption(list_district, "Huyện Thống Nhất", "Huyện Thống Nhất");
            addOption(list_district, "Thị xã Long Khánh", "Thị xã Long Khánh");
            addOption(list_district, "Huyện Xuân Lộc", "Huyện Xuân Lộc");
            addOption(list_district, "Huyện Long Thành", "Huyện Long Thành");
            addOption(list_district, "Huyện Nhơn Trạch", "Huyện Nhơn Trạch");
            addOption(list_district, "Huyện Trảng Bom", "Huyện Trảng Bom");
            addOption(list_district, "Huyện Cẩm Mỹ", "Huyện Cẩm Mỹ");
        }
        //Tinh Vung Tau
        else if (list_city.value === "Tỉnh Bà Rịa - Vũng Tàu") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Vũng Tàu", "TP. Vũng Tàu");
            addOption(list_district, "Thị xã Bà Rịa", "Thị xã Bà Rịa");
            addOption(list_district, "Huyện Xuyên Mộc", "Huyện Xuyên Mộc");
            addOption(list_district, "Huyện Long Điền", "Huyện Long Điền");
            addOption(list_district, "Huyện Côn Đảo", "Huyện Côn Đảo");
            addOption(list_district, "Huyện Tân Thành", "Huyện Tân Thành");
            addOption(list_district, "Huyện Châu Đức", "Huyện Châu Đức");
            addOption(list_district, "Huyện Đất Đỏ", "Huyện Đất Đỏ");
        }
        //Tinh Long An
        else if (list_city.value === "Tỉnh Long An") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Tân An", "TP. Tân An");
            addOption(list_district, "Huyện Vĩnh Hưng", "Huyện Vĩnh Hưng");
            addOption(list_district, "Huyện Mộc Hoá", "Huyện Mộc Hoá");
            addOption(list_district, "Huyện Tân Thạnh", "Huyện Tân Thạnh");
            addOption(list_district, "Huyện Thạnh Hoá", "Huyện Thạnh Hoá");
            addOption(list_district, "Huyện Đức Huệ", "Huyện Đức Huệ");
            addOption(list_district, "Huyện Đức Hoà", "Huyện Đức Hoà");
            addOption(list_district, "Huyện Bến Lức", "Huyện Bến Lức");
            addOption(list_district, "Huyện Thủ Thừa", "Huyện Thủ Thừa");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Tân Trụ", "Huyện Tân Trụ");
            addOption(list_district, "Huyện Cần Đước", "Huyện Cần Đước");
            addOption(list_district, "Huyện Cần Giuộc", "Huyện Cần Giuộc");
            addOption(list_district, "Huyện Tân Hưng", "Huyện Tân Hưng");
        }
        //Tinh Tien Giang
        else if (list_city.value === "Tỉnh Tiền Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Mỹ Tho", "TP. Mỹ Tho");
            addOption(list_district, "Thị xã Gò Công", "Thị xã Gò Công");
            addOption(list_district, "Huyện Cái Bè", "Huyện Cái Bè");
            addOption(list_district, "Huyện Cai Lậy", "Huyện Cai Lậy");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Chợ Gạo", "Huyện Chợ Gạo");
            addOption(list_district, "Huyện Gò Công Tây", "Huyện Gò Công Tây");
            addOption(list_district, "Huyện Gò Công Đông", "Huyện Gò Công Đông");
            addOption(list_district, "Huyện Tân Phước", "Huyện Tân Phước");
            addOption(list_district, "Huyện Tân Phú Đông", "Huyện Tân Phú Đông");
        }
        //Tinh Ben Tre
        else if (list_city.value === "Tỉnh Bến Tre") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Bến Tre", "TP. Bến Tre");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Chợ Lách", "Huyện Chợ Lách");
            addOption(list_district, "Huyện Mỏ Cày Bắc", "Huyện Mỏ Cày Bắc");
            addOption(list_district, "Huyện Giồng Trôm", "Huyện Giồng Trôm");
            addOption(list_district, "Huyện Bình Đại", "Huyện Bình Đại");
            addOption(list_district, "Huyện Ba Tri", "Huyện Ba Tri");
            addOption(list_district, "Huyện Thạnh Phú", "Huyện Thạnh Phú");
            addOption(list_district, "Huyện Mỏ Cày Nam", "Huyện Mỏ Cày Nam");
        }
        //Tinh Tra Vinh
        else if (list_city.value === "Tỉnh Trà Vinh") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Trà Vinh", "TP. Trà Vinh");
            addOption(list_district, "Huyện Càng Long", "Huyện Càng Long");
            addOption(list_district, "Huyện Cầu Kè", "Huyện Cầu Kè");
            addOption(list_district, "Huyện Tiểu Cần", "Huyện Tiểu Cần");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Trà Cú", "Huyện Trà Cú");
            addOption(list_district, "Huyện Cầu Ngang", "Huyện Cầu Ngang");
            addOption(list_district, "Huyện Duyên Hải", "Huyện Duyên Hải");
        }
        //Tinh Vinh Long
        else if (list_city.value === "Tỉnh Vĩnh Long") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Vĩnh Long", "TP. Vĩnh Long");
            addOption(list_district, "Huyện Long Hồ", "Huyện Long Hồ");
            addOption(list_district, "Huyện Mang Thít", "Huyện Mang Thít");
            addOption(list_district, "Huyện Bình Minh", "Huyện Bình Minh");
            addOption(list_district, "Huyện Tam Bình", "Huyện Tam Bình");
            addOption(list_district, "Huyện Trà Ôn", "Huyện Trà Ôn");
            addOption(list_district, "Huyện Vũng Liêm", "Huyện Vũng Liêm");
            addOption(list_district, "Huyện Bình Tân", "Huyện Bình Tân");
        }
        //Tinh Dong Thap
        else if (list_city.value === "Tỉnh Đồng Tháp") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Cao Lãnh", "TP. Cao Lãnh");
            addOption(list_district, "Thị xã Sa Đéc", "Thị xã Sa Đéc");
            addOption(list_district, "Huyện Tân Hồng", "Huyện Tân Hồng");
            addOption(list_district, "Huyện Hồng Ngự", "Huyện Hồng Ngự");
            addOption(list_district, "Huyện Tam Nông", "Huyện Tam Nông");
            addOption(list_district, "Huyện Thanh Bình", "Huyện Thanh Bình");
            addOption(list_district, "Huyện Cao Lãnh", "Huyện Cao Lãnh");
            addOption(list_district, "Huyện Lấp Vò", "Huyện Lấp Vò");
            addOption(list_district, "Huyện Tháp Mười", "Huyện Tháp Mười");
            addOption(list_district, "Huyện Lai Vung", "Huyện Lai Vung");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Thị xã Hồng Ngự", "Thị xã Hồng Ngự");
        }
        //Tinh An Giang
        else if (list_city.value === "Tỉnh An Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Long Xuyên", "TP. Long Xuyên");
            addOption(list_district, "Thị xã Châu Đốc", "Thị xã Châu Đốc");
            addOption(list_district, "Huyện An Phú", "Huyện An Phú");
            addOption(list_district, "Huyện Tân Châu", "Huyện Tân Châu");
            addOption(list_district, "Huyện Phú Tân", "Huyện Phú Tân");
            addOption(list_district, "Huyện Tịnh Biên", "Huyện Tịnh Biên");
            addOption(list_district, "Huyện Tri Tôn", "Huyện Tri Tôn");
            addOption(list_district, "Huyện Châu Phú", "Huyện Châu Phú");
            addOption(list_district, "Huyện Chợ Mới", "Huyện Chợ Mới");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Thoại Sơn", "Huyện Thoại Sơn");
        }
        //Tinh Kien Giang
        else if (list_city.value === "Tỉnh Kiên Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Rạch Giá", "TP. Rạch Giá");
            addOption(list_district, "Thị xã Hà Tiên", "Thị xã Hà Tiên");
            addOption(list_district, "Huyện Kiên Lương", "Huyện Kiên Lương");
            addOption(list_district, "Huyện Hòn Đất", "Huyện Hòn Đất");
            addOption(list_district, "Huyện Tân Hiệp", "Huyện Tân Hiệp");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Giồng Riềng", "Huyện Giồng Riềng");
            addOption(list_district, "Huyện Gò Quao", "Huyện Gò Quao");
            addOption(list_district, "Huyện An Biên", "Huyện An Biên");
            addOption(list_district, "Huyện An Minh", "Huyện An Minh");
            addOption(list_district, "Huyện Vĩnh Thuận", "Huyện Vĩnh Thuận");
            addOption(list_district, "Huyện đảo Phú Quốc", "Huyện đảo Phú Quốc");
            addOption(list_district, "Huyện Kiên Hải", "Huyện Kiên Hải");
            addOption(list_district, "Huyện U Minh Thượng", "Huyện U Minh Thượng");
            addOption(list_district, "Huyện Giang Thành", "Huyện Giang Thành");
        }
        //TP Can Tho
        else if (list_city.value === "Thành phố Cần Thơ") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "Quận Ninh Kiều", "Quận Ninh Kiều");
            addOption(list_district, "Quận Bình Thuỷ", "Quận Bình Thuỷ");
            addOption(list_district, "Quận Cái Răng", "Quận Cái Răng");
            addOption(list_district, "Quận Ô Môn", "Quận Ô Môn");
            addOption(list_district, "Huyện Phong Điền", "Huyện Phong Điền");
            addOption(list_district, "Huyện Cờ Đỏ", "Huyện Cờ Đỏ");
            addOption(list_district, "Huyện Vĩnh Thạnh", "Huyện Vĩnh Thạnh");
            addOption(list_district, "Quận Thốt Nốt", "Quận Thốt Nốt");
            addOption(list_district, "Huyện Thới Lai", "Huyện Thới Lai");
        }
        //Tinh Hau Giang
        else if (list_city.value === "Tỉnh Hậu Giang") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Vị Thanh", "TP. Vị Thanh");
            addOption(list_district, "Huyện Vị Thuỷ", "Huyện Vị Thuỷ");
            addOption(list_district, "Huyện Long Mỹ", "Huyện Long Mỹ");
            addOption(list_district, "Huyện Phụng Hiệp", "Huyện Phụng Hiệp");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Châu Thành A", "Huyện Châu Thành A");
            addOption(list_district, "Thị xã Ngã Bảy", "Thị xã Ngã Bảy");
        }
        //Tinh Soc Trang
        else if (list_city.value === "Tỉnh Sóc Trăng") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Sóc Trăng", "TP. Sóc Trăng");
            addOption(list_district, "Huyện Kế Sách", "Huyện Kế Sách");
            addOption(list_district, "Huyện Mỹ Tú", "Huyện Mỹ Tú");
            addOption(list_district, "Huyện Mỹ Xuyên", "Huyện Mỹ Xuyên");
            addOption(list_district, "Huyện Thạnh Trị", "Huyện Thạnh Trị");
            addOption(list_district, "Huyện Long Phú", "Huyện Long Phú");
            addOption(list_district, "Thị xã Vĩnh Châu", "Thị xã Vĩnh Châu");
            addOption(list_district, "Huyện Cù Lao Dung", "Huyện Cù Lao Dung");
            addOption(list_district, "Huyện Ngã Năm", "Huyện Ngã Năm");
            addOption(list_district, "Huyện Châu Thành", "Huyện Châu Thành");
            addOption(list_district, "Huyện Trần Đề", "Huyện Trần Đề");
        }
        //Tinh Bac Lieu
        else if (list_city.value === "Tỉnh Bạc Liêu") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Bạc Liêu", "TP. Bạc Liêu");
            addOption(list_district, "Huyện Vĩnh Lợi", "Huyện Vĩnh Lợi");
            addOption(list_district, "Huyện Hồng Dân", "Huyện Hồng Dân");
            addOption(list_district, "Huyện Giá Rai", "Huyện Giá Rai");
            addOption(list_district, "Huyện Phước Long", "Huyện Phước Long");
            addOption(list_district, "Huyện Đông Hải", "Huyện Đông Hải");
            addOption(list_district, "Huyện Hoà Bình", "Huyện Hoà Bình");
        }
        //Tinh Ca Mau
        else if (list_city.value === "Tỉnh Cà Mau") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Cà Mau", "TP. Cà Mau");
            addOption(list_district, "Huyện Thới Bình", "Huyện Thới Bình");
            addOption(list_district, "Huyện U Minh", "Huyện U Minh");
            addOption(list_district, "Huyện Trần Văn Thời", "Huyện Trần Văn Thời");
            addOption(list_district, "Huyện Cái Nước", "Huyện Cái Nước");
            addOption(list_district, "Huyện Đầm Dơi", "Huyện Đầm Dơi");
            addOption(list_district, "Huyện Ngọc Hiển", "Huyện Ngọc Hiển");
            addOption(list_district, "Huyện Năm Căn", "Huyện Năm Căn");
            addOption(list_district, "Huyện Phú Tân", "Huyện Phú Tân");
        }
        //Tinh Ha Tay
        else if (list_city.value === "Tỉnh Hà Tây") {
            addOption(list_district, "Chọn quận huyện", "Chưa chọn quận/huyện");
            addOption(list_district, "TP. Hà Đông", "TP. Hà Đông");
            addOption(list_district, "TP. Sơn Tây", "TP. Sơn Tây");
            addOption(list_district, "Huyện Ba Vì", "Huyện Ba Vì");
            addOption(list_district, "Huyện Chương Mỹ", "Huyện Chương Mỹ");
            addOption(list_district, "Huyện Đan Phượng", "Huyện Đan Phượng");
            addOption(list_district, "Huyện Hoài Đức", "Huyện Hoài Đức");
            addOption(list_district, "Huyện Mỹ Đức", "Huyện Mỹ Đức");
            addOption(list_district, "Huyện Phú Xuyên", "Huyện Phú Xuyên");
            addOption(list_district, "Huyện Phúc Thọ", "Huyện Phúc Thọ");
            addOption(list_district, "Huyện Quốc Oai", "Huyện Quốc Oai");
            addOption(list_district, "Huyện Thạch Thất", "Huyện Thạch Thất");
            addOption(list_district, "Huyện Thanh Oai", "Huyện Thanh Oai");
            addOption(list_district, "Huyện Thường Tín", "Huyện Thường Tín");
            addOption(list_district, "Huyện Ứng Hòa", "Huyện Ứng Hòa");
        } else {
            removeAllOptions(list_district);
        }
    }
</script>