<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ["governorate_id"=>"1","city"=>"15 May"],
            ["governorate_id"=>"1","city"=>"Al Azbakeyah"],
            ["governorate_id"=>"1","city"=>"Al Basatin"],
            ["governorate_id"=>"1","city"=>"Tebin"],
            ["governorate_id"=>"1","city"=>"El-Khalifa"],
            ["governorate_id"=>"1","city"=>"El darrasa"],
            ["governorate_id"=>"1","city"=>"Aldarb Alahmar"],
            ["governorate_id"=>"1","city"=>"Zawya al-Hamra"],
            ["governorate_id"=>"1","city"=>"El-Zaytoun"],
            ["governorate_id"=>"1","city"=>"Sahel"],
            ["governorate_id"=>"1","city"=>"El Salam"],
            ["governorate_id"=>"1","city"=>"Sayeda Zeinab"],
            ["governorate_id"=>"1","city"=>"El Sharabeya"],
            ["governorate_id"=>"1","city"=>"Shorouk"],
            ["governorate_id"=>"1","city"=>"El Daher"],
            ["governorate_id"=>"1","city"=>"Ataba"],
            ["governorate_id"=>"1","city"=>"New Cairo"],
            ["governorate_id"=>"1","city"=>"El Marg"],
            ["governorate_id"=>"1","city"=>"Ezbet el Nakhl"],
            ["governorate_id"=>"1","city"=>"Matareya"],
            ["governorate_id"=>"1","city"=>"Maadi"],
            ["governorate_id"=>"1","city"=>"Maasara"],
            ["governorate_id"=>"1","city"=>"Mokattam"],
            ["governorate_id"=>"1","city"=>"Manyal"],
            ["governorate_id"=>"1","city"=>"Mosky"],
            ["governorate_id"=>"1","city"=>"Nozha"],
            ["governorate_id"=>"1","city"=>"Waily"],
            ["governorate_id"=>"1","city"=>"Bab al-Shereia"],
            ["governorate_id"=>"1","city"=>"Bolaq"],
            ["governorate_id"=>"1","city"=>"Garden City"],
            ["governorate_id"=>"1","city"=>"Hadayek El-Kobba"],
            ["governorate_id"=>"1","city"=>"Helwan"],
            ["governorate_id"=>"1","city"=>"Dar Al Salam"],
            // ["governorate_id"=>"1","city_name_ar"=>"????????","city"=>"Shubra"],
            // ["governorate_id"=>"1","city_name_ar"=>"??????","city"=>"Tura"],
            // ["governorate_id"=>"1","city_name_ar"=>"????????????","city"=>"Abdeen"],
            // ["governorate_id"=>"1","city_name_ar"=>"????????????","city"=>"Abaseya"],
            // ["governorate_id"=>"1","city_name_ar"=>"?????? ??????","city"=>"Ain Shams"],
            // ["governorate_id"=>"1","city_name_ar"=>"?????????? ??????","city"=>"Nasr City"],
            // ["governorate_id"=>"1","city_name_ar"=>"?????? ??????????????","city"=>"New Heliopolis"],
            ["governorate_id"=>"1", "city"=>"Masr Al Qadima"],
            ["governorate_id"=>"1","city"=>"Mansheya Nasir"],
            ["governorate_id"=>"1","city"=>"Badr City"],
            ["governorate_id"=>"1","city"=>"Obour City"],
            ["governorate_id"=>"1","city"=>"Cairo Downtown"],
            ["governorate_id"=>"1","city"=>"Zamalek"],
            ["governorate_id"=>"1","city"=>"Kasr El Nile"],
            ["governorate_id"=>"1","city"=>"Rehab"],
            ["governorate_id"=>"1","city"=>"Katameya"],
            ["governorate_id"=>"1","city"=>"Madinty"],
            ["governorate_id"=>"1","city"=>"Rod Alfarag"],
            ["governorate_id"=>"1","city"=>"Sheraton"],
            ["governorate_id"=>"1","city"=>"El-Gamaleya"],
            ["governorate_id"=>"1","city"=>"10th of Ramadan City"],
            ["governorate_id"=>"1","city"=>"Helmeyat Alzaytoun"],
            ["governorate_id"=>"1","city"=>"New Nozha"],
            ["governorate_id"=>"1","city"=>"Capital New"],
            ["governorate_id"=>"2","city"=>"Giza"],
            ["governorate_id"=>"2","city"=>"Sixth of October"],
            ["governorate_id"=>"2","city"=>"Cheikh Zayed"],
            ["governorate_id"=>"2","city"=>"Hawamdiyah"],
            ["governorate_id"=>"2","city"=>"Al Badrasheen"],
            // ["governorate_id"=>"2",??","city"=>"Saf"],
            // ["governorate_id"=>"2",????","city"=>"Atfih"],
            // ["governorate_id"=>"2",??????","city"=>"Al Ayat"],
            // ["governorate_id"=>"2",??????????","city"=>"Al-Bawaiti"],
            // ["governorate_id"=>"2",???? ??????????????","city"=>"ManshiyetAl Qanater"],
            // ["governorate_id"=>"2",????","city"=>"Oaseem"],
            // ["governorate_id"=>"2",??????","city"=>"Kerdasa"],
            // ["governorate_id"=>"2", ????????????","city"=>"Abu Nomros"],
            // ["governorate_id"=>"2", ??????????","city"=>"Kafr Ghati"],
            // ["governorate_id"=>"2",???? ??????????????","city"=>"Manshiyet Al Bakari"],
            // ["governorate_id"=>"2",????","city"=>"Dokki"],
            // ["governorate_id"=>"2",????????","city"=>"Agouza"],
            // ["governorate_id"=>"2",????","city"=>"Haram"],
            // ["governorate_id"=>"2",??????","city"=>"Warraq"],
            // ["governorate_id"=>"2",??????","city"=>"Imbaba"],
            // ["governorate_id"=>"2",???? ??????????????","city"=>"Boulaq Dakrour"],
            // ["governorate_id"=>"2",???????? ??????????????","city"=>"Al Wahat Al Baharia"],
            // ["governorate_id"=>"2",????????????","city"=>"Omraneya"],
            // ["governorate_id"=>"2",??????","city"=>"Moneeb"],
            // ["governorate_id"=>"2", ????????????????","city"=>"Bin Alsarayat"],
            // ["governorate_id"=>"2",???? ??????","city"=>"Kit Kat"],
            // ["governorate_id"=>"2",????????????","city"=>"Mohandessin"],
            // ["governorate_id"=>"2",??","city"=>"Faisal"],
            // ["governorate_id"=>"2", ????????","city"=>"Abu Rawash"],
            // ["governorate_id"=>"2",???? ??????????????","city"=>"Hadayek Alahram"],
            // ["governorate_id"=>"2",??????????","city"=>"Haraneya"],
            // ["governorate_id"=>"2",???? ????????????","city"=>"Hadayek October"],
            // ["governorate_id"=>"2", ??????????","city"=>"Saft Allaban"],
            // ["governorate_id"=>"2",?????? ????????????","city"=>"Smart Village"],
            // ["governorate_id"=>"2", ????????????","city"=>"Ard Ellwaa"],
            ["governorate_id"=>"3","city"=>"Abu Qir"],
            ["governorate_id"=>"3","city"=>"Al Ibrahimeyah"],
            ["governorate_id"=>"3","city"=>"Azarita"],
            ["governorate_id"=>"3","city"=>"Anfoushi"],
            ["governorate_id"=>"3","city"=>"Dekheila"],
            ["governorate_id"=>"3","city"=>"El Soyof"],
            ["governorate_id"=>"3","city"=>"Ameria"],
            // ["id"=>"100","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"El Labban"],
            // ["id"=>"101","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Al Mafrouza"],
            // ["id"=>"102","governorate_id"=>"3","city_name_ar"=>"??????????????","city"=>"El Montaza"],
            // ["id"=>"103","governorate_id"=>"3","city_name_ar"=>"??????????????","city"=>"Mansheya"],
            // ["id"=>"104","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Naseria"],
            // ["id"=>"105","governorate_id"=>"3","city_name_ar"=>"??????????????","city"=>"Ambrozo"],
            // ["id"=>"106","governorate_id"=>"3","city_name_ar"=>"?????? ??????","city"=>"Bab Sharq"],
            // ["id"=>"107","governorate_id"=>"3","city_name_ar"=>"?????? ??????????","city"=>"Bourj Alarab"],
            // ["id"=>"108","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Stanley"],
            // ["id"=>"109","governorate_id"=>"3","city_name_ar"=>"??????????","city"=>"Smouha"],
            // ["id"=>"110","governorate_id"=>"3","city_name_ar"=>"???????? ??????","city"=>"Sidi Bishr"],
            // ["id"=>"111","governorate_id"=>"3","city_name_ar"=>"??????","city"=>"Shads"],
            // ["id"=>"112","governorate_id"=>"3","city_name_ar"=>"?????? ??????????","city"=>"Gheet Alenab"],
            // ["id"=>"113","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Fleming"],
            // ["id"=>"114","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Victoria"],
            // ["id"=>"115","governorate_id"=>"3","city_name_ar"=>"???????? ??????????","city"=>"Camp Shizar"],
            // ["id"=>"116","governorate_id"=>"3","city_name_ar"=>"??????????","city"=>"Karmooz"],
            // ["id"=>"117","governorate_id"=>"3","city_name_ar"=>"???????? ??????????","city"=>"Mahta Alraml"],
            // ["id"=>"118","governorate_id"=>"3","city_name_ar"=>"???????? ??????????","city"=>"Mina El-Basal"],
            // ["id"=>"119","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Asafra"],
            // ["id"=>"120","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Agamy"],
            // ["id"=>"121","governorate_id"=>"3","city_name_ar"=>"????????","city"=>"Bakos"],
            // ["id"=>"122","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Boulkly"],
            // ["id"=>"123","governorate_id"=>"3","city_name_ar"=>"??????????????????","city"=>"Cleopatra"],
            // ["id"=>"124","governorate_id"=>"3","city_name_ar"=>"????????","city"=>"Glim"],
            // ["id"=>"125","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Al Mamurah"],
            // ["id"=>"126","governorate_id"=>"3","city_name_ar"=>"??????????????","city"=>"Al Mandara"],
            // ["id"=>"127","governorate_id"=>"3","city_name_ar"=>"???????? ????","city"=>"Moharam Bek"],
            // ["id"=>"128","governorate_id"=>"3","city_name_ar"=>"??????????????","city"=>"Elshatby"],
            // ["id"=>"129","governorate_id"=>"3","city_name_ar"=>"???????? ????????","city"=>"Sidi Gaber"],
            // ["id"=>"130","governorate_id"=>"3","city_name_ar"=>"???????????? ??????????????","city"=>"North Coast\/sahel"],
            // ["id"=>"131","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Alhadra"],
            // ["id"=>"132","governorate_id"=>"3","city_name_ar"=>"????????????????","city"=>"Alattarin"],
            // ["id"=>"133","governorate_id"=>"3","city_name_ar"=>"???????? ????????","city"=>"Sidi Kerir"],
            // ["id"=>"134","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Elgomrok"],
            // ["id"=>"135","governorate_id"=>"3","city_name_ar"=>"??????????","city"=>"Al Max"],
            // ["id"=>"136","governorate_id"=>"3","city_name_ar"=>"????????????","city"=>"Marina"],
            // ["id"=>"137","governorate_id"=>"4","city_name_ar"=>"????????????????","city"=>"Mansoura"],
            // ["id"=>"138","governorate_id"=>"4","city_name_ar"=>"????????","city"=>"Talkha"],
            // ["id"=>"139","governorate_id"=>"4","city_name_ar"=>"?????? ??????","city"=>"Mitt Ghamr"],
            // ["id"=>"140","governorate_id"=>"4","city_name_ar"=>"??????????","city"=>"Dekernes"],
            // ["id"=>"141","governorate_id"=>"4","city_name_ar"=>"??????","city"=>"Aga"],
            // ["id"=>"142","governorate_id"=>"4","city_name_ar"=>"???????? ??????????","city"=>"Menia El Nasr"],
            // ["id"=>"143","governorate_id"=>"4","city_name_ar"=>"????????????????????","city"=>"Sinbillawin"],
            // ["id"=>"144","governorate_id"=>"4","city_name_ar"=>"????????????","city"=>"El Kurdi"],
            // ["id"=>"145","governorate_id"=>"4","city_name_ar"=>"?????? ????????","city"=>"Bani Ubaid"],
            // ["id"=>"146","governorate_id"=>"4","city_name_ar"=>"??????????????","city"=>"Al Manzala"],
            // ["id"=>"147","governorate_id"=>"4","city_name_ar"=>"?????? ??????????????","city"=>"tami al'amdid"],
            // ["id"=>"148","governorate_id"=>"4","city_name_ar"=>"????????????????","city"=>"aljamalia"],
            ["governorate_id"=>"4","city"=>"Sherbin"],
            // ["governorate_id"=>"4""??????????","city"=>"Belqas"],
            // ["governorate_id"=>"4""?????? ??????????","city"=>"Meet Salsil"],
            // ["governorate_id"=>"4""????????","city"=>"Gamasa"],
            // ["governorate_id"=>"4""???????? ????????","city"=>"Mahalat Damana"],
            // ["id"=>"155","governorate_id"=>"4","city_name_ar"=>"??????????","city"=>"Nabroh"],
            // ["id"=>"156","governorate_id"=>"5","city_name_ar"=>"??????????????","city"=>"Hurghada"],
            // ["id"=>"157","governorate_id"=>"5","city_name_ar"=>"?????? ????????","city"=>"Ras Ghareb"],
            ["governorate_id"=>"5","city"=>"Safaga"],
            // ["id"=>"159","governorate_id"=>"5","city_name_ar"=>"????????????","city"=>"El Qusiar"],
            // ["id"=>"160","governorate_id"=>"5","city_name_ar"=>"???????? ??????","city"=>"Marsa Alam"],
            // ["id"=>"161","governorate_id"=>"5","city_name_ar"=>"????????????????","city"=>"Shalatin"],
            // ["id"=>"162","governorate_id"=>"5","city_name_ar"=>"??????????","city"=>"Halaib"],
            // ["id"=>"163","governorate_id"=>"5","city_name_ar"=>"????????????","city"=>"Aldahar"],
            // ["id"=>"164","governorate_id"=>"6","city_name_ar"=>"????????????","city"=>"Damanhour"],
            // ["id"=>"165","governorate_id"=>"6","city_name_ar"=>"?????? ????????????","city"=>"Kafr El Dawar"],
            ["governorate_id"=>"6","city"=>"Rashid"],
            // ["id"=>"167","governorate_id"=>"6","city_name_ar"=>"????????","city"=>"Edco"],
            // ["id"=>"168","governorate_id"=>"6","city_name_ar"=>"?????? ????????????????","city"=>"Abu al-Matamir"],
            // ["id"=>"169","governorate_id"=>"6","city_name_ar"=>"?????? ??????","city"=>"Abu Homs"],
            // ["id"=>"170","governorate_id"=>"6","city_name_ar"=>"????????????????","city"=>"Delengat"],
            // ["id"=>"171","governorate_id"=>"6","city_name_ar"=>"??????????????????","city"=>"Mahmoudiyah"],
            // ["id"=>"172","governorate_id"=>"6","city_name_ar"=>"??????????????????","city"=>"Rahmaniyah"],
            // ["id"=>"173","governorate_id"=>"6","city_name_ar"=>"?????????? ??????????????","city"=>"Itai Baroud"],
            // ["id"=>"174","governorate_id"=>"6","city_name_ar"=>"?????? ????????","city"=>"Housh Eissa"],
            // ["id"=>"175","governorate_id"=>"6","city_name_ar"=>"??????????????","city"=>"Shubrakhit"],
            // ["id"=>"176","governorate_id"=>"6","city_name_ar"=>"?????? ??????????","city"=>"Kom Hamada"],
            // ["id"=>"177","governorate_id"=>"6","city_name_ar"=>"??????","city"=>"Badr"],
            // ["id"=>"178","governorate_id"=>"6","city_name_ar"=>"???????? ??????????????","city"=>"Wadi Natrun"],
            // ["id"=>"179","governorate_id"=>"6","city_name_ar"=>"?????????????????? ??????????????","city"=>"New Nubaria"],
            // ["id"=>"180","governorate_id"=>"6","city_name_ar"=>"??????????????????","city"=>"Alnoubareya"],
            // ["id"=>"181","governorate_id"=>"7","city_name_ar"=>"????????????","city"=>"Fayoum"],
            // ["id"=>"182","governorate_id"=>"7","city_name_ar"=>"???????????? ??????????????","city"=>"Fayoum El Gedida"],
            ["governorate_id"=>"7","city"=>"Tamiya"],
            // ["id"=>"184","governorate_id"=>"7","city_name_ar"=>"??????????","city"=>"Snores"],
            // ["id"=>"185","governorate_id"=>"7","city_name_ar"=>"????????","city"=>"Etsa"],
            // ["id"=>"186","governorate_id"=>"7","city_name_ar"=>"????????????","city"=>"Epschway"],
            // ["id"=>"187","governorate_id"=>"7","city_name_ar"=>"???????? ????????????","city"=>"Yusuf El Sediaq"],
            // ["id"=>"188","governorate_id"=>"7","city_name_ar"=>"??????????????","city"=>"Hadqa"],
            // ["id"=>"189","governorate_id"=>"7","city_name_ar"=>"????????","city"=>"Atsa"],
            // ["id"=>"190","governorate_id"=>"7","city_name_ar"=>"??????????????","city"=>"Algamaa"],
            // ["id"=>"191","governorate_id"=>"7","city_name_ar"=>"??????????????","city"=>"Sayala"],
            // ["id"=>"192","governorate_id"=>"8","city_name_ar"=>"????????","city"=>"Tanta"],
            // ["id"=>"193","governorate_id"=>"8","city_name_ar"=>"???????????? ????????????","city"=>"Al Mahalla Al Kobra"],
            // ["id"=>"194","governorate_id"=>"8","city_name_ar"=>"?????? ????????????","city"=>"Kafr El Zayat"],
            // ["id"=>"195","governorate_id"=>"8","city_name_ar"=>"????????","city"=>"Zefta"],
            // ["id"=>"196","governorate_id"=>"8","city_name_ar"=>"????????????","city"=>"El Santa"],
            // ["id"=>"197","governorate_id"=>"8","city_name_ar"=>"????????","city"=>"Qutour"],
            // ["id"=>"198","governorate_id"=>"8","city_name_ar"=>"??????????","city"=>"Basion"],
            // ["id"=>"199","governorate_id"=>"8","city_name_ar"=>"??????????","city"=>"Samannoud"],
            // ["id"=>"200","governorate_id"=>"9","city_name_ar"=>"??????????????????????","city"=>"Ismailia"],
            // ["id"=>"201","governorate_id"=>"9","city_name_ar"=>"????????","city"=>"Fayed"],
            // ["id"=>"202","governorate_id"=>"9","city_name_ar"=>"?????????????? ??????","city"=>"Qantara Sharq"],
            // ["id"=>"203","governorate_id"=>"9","city_name_ar"=>"?????????????? ??????","city"=>"Qantara Gharb"],
            // ["id"=>"204","governorate_id"=>"9","city_name_ar"=>"???????? ????????????","city"=>"El Tal El Kabier"],
            // ["id"=>"205","governorate_id"=>"9","city_name_ar"=>"?????? ????????","city"=>"Abu Sawir"],
            // ["id"=>"206","governorate_id"=>"9","city_name_ar"=>"???????????????? ??????????????","city"=>"Kasasien El Gedida"],
            // ["id"=>"207","governorate_id"=>"9","city_name_ar"=>"??????????","city"=>"Nefesha"],
            // ["id"=>"208","governorate_id"=>"9","city_name_ar"=>"?????????? ????????","city"=>"Sheikh Zayed"],
            // ["id"=>"209","governorate_id"=>"10","city_name_ar"=>"???????? ??????????","city"=>"Shbeen El Koom"],
            // ["id"=>"210","governorate_id"=>"10","city_name_ar"=>"?????????? ??????????????","city"=>"Sadat City"],
            // ["id"=>"211","governorate_id"=>"10","city_name_ar"=>"????????","city"=>"Menouf"],
            // ["id"=>"212","governorate_id"=>"10","city_name_ar"=>"?????? ????????????","city"=>"Sars El-Layan"],
            // ["id"=>"213","governorate_id"=>"10","city_name_ar"=>"??????????","city"=>"Ashmon"],
            // ["id"=>"214","governorate_id"=>"10","city_name_ar"=>"??????????????","city"=>"Al Bagor"],
            // ["id"=>"215","governorate_id"=>"10","city_name_ar"=>"????????????","city"=>"Quesna"],
            // ["id"=>"216","governorate_id"=>"10","city_name_ar"=>"???????? ??????????","city"=>"Berkat El Saba"],
            // ["id"=>"217","governorate_id"=>"10","city_name_ar"=>"??????","city"=>"Tala"],
            // ["id"=>"218","governorate_id"=>"10","city_name_ar"=>"??????????????","city"=>"Al Shohada"],
            // ["id"=>"219","governorate_id"=>"11","city_name_ar"=>"????????????","city"=>"Minya"],
            // ["id"=>"220","governorate_id"=>"11","city_name_ar"=>"???????????? ??????????????","city"=>"Minya El Gedida"],
            // ["id"=>"221","governorate_id"=>"11","city_name_ar"=>"????????????","city"=>"El Adwa"],
            // ["id"=>"222","governorate_id"=>"11","city_name_ar"=>"??????????","city"=>"Magagha"],
            // ["id"=>"223","governorate_id"=>"11","city_name_ar"=>"?????? ????????","city"=>"Bani Mazar"],
            // ["id"=>"224","governorate_id"=>"11","city_name_ar"=>"????????","city"=>"Mattay"],
            // ["id"=>"225","governorate_id"=>"11","city_name_ar"=>"????????????","city"=>"Samalut"],
            // ["id"=>"226","governorate_id"=>"11","city_name_ar"=>"?????????????? ??????????????","city"=>"Madinat El Fekria"],
            // ["id"=>"227","governorate_id"=>"11","city_name_ar"=>"????????","city"=>"Meloy"],
            // ["id"=>"228","governorate_id"=>"11","city_name_ar"=>"?????? ????????","city"=>"Deir Mawas"],
            // ["id"=>"229","governorate_id"=>"11","city_name_ar"=>"?????? ??????????","city"=>"Abu Qurqas"],
            // ["id"=>"230","governorate_id"=>"11","city_name_ar"=>"?????? ??????????","city"=>"Ard Sultan"],
            // ["id"=>"231","governorate_id"=>"12","city_name_ar"=>"????????","city"=>"Banha"],
            // ["id"=>"232","governorate_id"=>"12","city_name_ar"=>"??????????","city"=>"Qalyub"],
            // ["id"=>"233","governorate_id"=>"12","city_name_ar"=>"???????? ????????????","city"=>"Shubra Al Khaimah"],
            // ["id"=>"234","governorate_id"=>"12","city_name_ar"=>"?????????????? ??????????????","city"=>"Al Qanater Charity"],
            // ["id"=>"235","governorate_id"=>"12","city_name_ar"=>"??????????????","city"=>"Khanka"],
            // ["id"=>"236","governorate_id"=>"12","city_name_ar"=>"?????? ??????","city"=>"Kafr Shukr"],
            // ["id"=>"237","governorate_id"=>"12","city_name_ar"=>"??????","city"=>"Tukh"],
            // ["id"=>"238","governorate_id"=>"12","city_name_ar"=>"??????","city"=>"Qaha"],
            // ["id"=>"239","governorate_id"=>"12","city_name_ar"=>"????????????","city"=>"Obour"],
            // ["id"=>"240","governorate_id"=>"12","city_name_ar"=>"????????????","city"=>"Khosous"],
            // ["id"=>"241","governorate_id"=>"12","city_name_ar"=>"???????? ??????????????","city"=>"Shibin Al Qanater"],
            // ["id"=>"242","governorate_id"=>"12","city_name_ar"=>"??????????","city"=>"Mostorod"],
            // ["id"=>"243","governorate_id"=>"13","city_name_ar"=>"??????????????","city"=>"El Kharga"],
            // ["id"=>"244","governorate_id"=>"13","city_name_ar"=>"??????????","city"=>"Paris"],
            // ["id"=>"245","governorate_id"=>"13","city_name_ar"=>"??????","city"=>"Mout"],
            ["governorate_id"=>"13","city"=>"Farafra"],
            ["governorate_id"=>"13","city"=>"Balat"],
            ["governorate_id"=>"13","city"=>"Dakhla"],
            ["governorate_id"=>"14","city"=>"Suez"],
            // ["id"=>"250","governorate_id"=>"14","city_name_ar"=>"??????????????","city"=>"Alganayen"],
            // ["id"=>"251","governorate_id"=>"14","city_name_ar"=>"??????????","city"=>"Ataqah"],
            // ["id"=>"252","governorate_id"=>"14","city_name_ar"=>"?????????? ????????????","city"=>"Ain Sokhna"],
            // ["id"=>"253","governorate_id"=>"14","city_name_ar"=>"????????","city"=>"Faysal"],
            // ["id"=>"254","governorate_id"=>"15","city_name_ar"=>"??????????","city"=>"Aswan"],
            // ["id"=>"255","governorate_id"=>"15","city_name_ar"=>"?????????? ??????????????","city"=>"Aswan El Gedida"],
            // ["id"=>"256","governorate_id"=>"15","city_name_ar"=>"????????","city"=>"Drau"],
            // ["id"=>"257","governorate_id"=>"15","city_name_ar"=>"?????? ????????","city"=>"Kom Ombo"],
            // ["id"=>"258","governorate_id"=>"15","city_name_ar"=>"?????? ????????????","city"=>"Nasr Al Nuba"],
            // ["id"=>"259","governorate_id"=>"15","city_name_ar"=>"????????????","city"=>"Kalabsha"],
            // ["id"=>"260","governorate_id"=>"15","city_name_ar"=>"????????","city"=>"Edfu"],
            // ["id"=>"261","governorate_id"=>"15","city_name_ar"=>"????????????????","city"=>"Al-Radisiyah"],
            ["governorate_id"=>"15","city"=>"Al Basilia"],
            ["governorate_id"=>"15","city"=>"Al Sibaeia"],
            ["governorate_id"=>"15","city"=>"Abo Simbl Al Siyahia"],
            // ["id"=>"265","governorate_id"=>"15","city_name_ar"=>"???????? ??????","city"=>"Marsa Alam"],
            // ["id"=>"266","governorate_id"=>"16","city_name_ar"=>"??????????","city"=>"Assiut"],
            // ["id"=>"267","governorate_id"=>"16","city_name_ar"=>"?????????? ??????????????","city"=>"Assiut El Gedida"],
            // ["id"=>"268","governorate_id"=>"16","city_name_ar"=>"??????????","city"=>"Dayrout"],
            // ["id"=>"269","governorate_id"=>"16","city_name_ar"=>"????????????","city"=>"Manfalut"],
            // ["id"=>"270","governorate_id"=>"16","city_name_ar"=>"??????????????","city"=>"Qusiya"],
            // ["id"=>"271","governorate_id"=>"16","city_name_ar"=>"??????????","city"=>"Abnoub"],
            // ["id"=>"272","governorate_id"=>"16","city_name_ar"=>"?????? ??????","city"=>"Abu Tig"],
            // ["id"=>"273","governorate_id"=>"16","city_name_ar"=>"??????????????","city"=>"El Ghanaim"],
            // ["id"=>"274","governorate_id"=>"16","city_name_ar"=>"???????? ????????","city"=>"Sahel Selim"],
            // ["id"=>"275","governorate_id"=>"16","city_name_ar"=>"??????????????","city"=>"El Badari"],
            // ["id"=>"276","governorate_id"=>"16","city_name_ar"=>"????????","city"=>"Sidfa"],
            // ["id"=>"277","governorate_id"=>"17","city_name_ar"=>"?????? ????????","city"=>"Bani Sweif"],
            ["governorate_id"=>"17","city"=>"Beni Suef El Gedida"],
            ["governorate_id"=>"17","city"=>"Al Wasta"],
            ["governorate_id"=>"17","city"=>"Naser"],
            ["governorate_id"=>"17","city"=>"Ehnasia"],
            ["governorate_id"=>"17","city"=>"beba"],
            ["governorate_id"=>"17","city"=>"Fashn"],
            ["governorate_id"=>"17","city"=>"Somasta"],
            ["governorate_id"=>"17","city"=>"Alabbaseri"],
            // ["id"=>"286","governorate_id"=>"17","city_name_ar"=>"????????","city"=>"Mokbel"],
            // ["id"=>"287","governorate_id"=>"18","city_name_ar"=>"??????????????","city"=>"PorSaid"],
            // ["id"=>"288","governorate_id"=>"18","city_name_ar"=>"??????????????","city"=>"Port Fouad"],
            // ["id"=>"289","governorate_id"=>"18","city_name_ar"=>"??????????","city"=>"Alarab"],
            // ["id"=>"290","governorate_id"=>"18","city_name_ar"=>"???? ????????????","city"=>"Zohour"],
            // ["id"=>"291","governorate_id"=>"18","city_name_ar"=>"???? ??????????","city"=>"Alsharq"],
            // ["id"=>"292","governorate_id"=>"18","city_name_ar"=>"???? ??????????????","city"=>"Aldawahi"],
            // ["id"=>"293","governorate_id"=>"18","city_name_ar"=>"???? ????????????","city"=>"Almanakh"],
            // ["id"=>"294","governorate_id"=>"18","city_name_ar"=>"???? ??????????","city"=>"Mubarak"],
            // ["id"=>"295","governorate_id"=>"19","city_name_ar"=>"??????????","city"=>"Damietta"],
            // ["id"=>"296","governorate_id"=>"19","city_name_ar"=>"?????????? ??????????????","city"=>"New Damietta"],
            // ["id"=>"297","governorate_id"=>"19","city_name_ar"=>"?????? ????????","city"=>"Ras El Bar"],
            // ["id"=>"298","governorate_id"=>"19","city_name_ar"=>"??????????????","city"=>"Faraskour"],
            // ["id"=>"299","governorate_id"=>"19","city_name_ar"=>"????????????","city"=>"Zarqa"],
            // ["id"=>"300","governorate_id"=>"19","city_name_ar"=>"??????????","city"=>"alsaru"],
            // ["id"=>"301","governorate_id"=>"19","city_name_ar"=>"????????????","city"=>"alruwda"],
            // ["id"=>"302","governorate_id"=>"19","city_name_ar"=>"?????? ????????????","city"=>"Kafr El-Batikh"],
            // ["id"=>"303","governorate_id"=>"19","city_name_ar"=>"???????? ??????????","city"=>"Azbet Al Burg"],
            // ["id"=>"304","governorate_id"=>"19","city_name_ar"=>"?????? ?????? ????????","city"=>"Meet Abou Ghalib"],
            // ["id"=>"305","governorate_id"=>"19","city_name_ar"=>"?????? ??????","city"=>"Kafr Saad"],
            // ["id"=>"306","governorate_id"=>"20","city_name_ar"=>"????????????????","city"=>"Zagazig"],
            // ["id"=>"307","governorate_id"=>"20","city_name_ar"=>"???????????? ???? ??????????","city"=>"Al Ashr Men Ramadan"],
            // ["id"=>"308","governorate_id"=>"20","city_name_ar"=>"???????? ??????????","city"=>"Minya Al Qamh"],
            // ["id"=>"309","governorate_id"=>"20","city_name_ar"=>"??????????","city"=>"Belbeis"],
            // ["id"=>"310","governorate_id"=>"20","city_name_ar"=>"?????????? ??????????","city"=>"Mashtoul El Souq"],
            // ["id"=>"311","governorate_id"=>"20","city_name_ar"=>"????????????????","city"=>"Qenaiat"],
            // ["id"=>"312","governorate_id"=>"20","city_name_ar"=>"?????? ????????","city"=>"Abu Hammad"],
            // ["id"=>"313","governorate_id"=>"20","city_name_ar"=>"????????????","city"=>"El Qurain"],
            // ["id"=>"314","governorate_id"=>"20","city_name_ar"=>"????????","city"=>"Hehia"],
            // ["id"=>"315","governorate_id"=>"20","city_name_ar"=>"?????? ????????","city"=>"Abu Kabir"],
            // ["id"=>"316","governorate_id"=>"20","city_name_ar"=>"??????????","city"=>"Faccus"],
            // ["id"=>"317","governorate_id"=>"20","city_name_ar"=>"???????????????? ??????????????","city"=>"El Salihia El Gedida"],
            // ["id"=>"318","governorate_id"=>"20","city_name_ar"=>"??????????????????????","city"=>"Al Ibrahimiyah"],
            // ["id"=>"319","governorate_id"=>"20","city_name_ar"=>"???????? ??????","city"=>"Deirb Negm"],
            // ["id"=>"320","governorate_id"=>"20","city_name_ar"=>"?????? ??????","city"=>"Kafr Saqr"],
            // ["id"=>"321","governorate_id"=>"20","city_name_ar"=>"?????????? ??????","city"=>"Awlad Saqr"],
            // ["id"=>"322","governorate_id"=>"20","city_name_ar"=>"????????????????","city"=>"Husseiniya"],
            // ["id"=>"323","governorate_id"=>"20","city_name_ar"=>"?????? ?????????? ??????????????","city"=>"san alhajar alqablia"],
            // ["id"=>"324","governorate_id"=>"20","city_name_ar"=>"?????????? ?????? ??????","city"=>"Manshayat Abu Omar"],
            // ["id"=>"325","governorate_id"=>"21","city_name_ar"=>"??????????","city"=>"Al Toor"],
            // ["id"=>"326","governorate_id"=>"21","city_name_ar"=>"?????? ??????????","city"=>"Sharm El-Shaikh"],
            // ["id"=>"327","governorate_id"=>"21","city_name_ar"=>"??????","city"=>"Dahab"],
            // ["id"=>"328","governorate_id"=>"21","city_name_ar"=>"??????????","city"=>"Nuweiba"],
            // ["id"=>"329","governorate_id"=>"21","city_name_ar"=>"????????","city"=>"Taba"],
            // ["id"=>"330","governorate_id"=>"21","city_name_ar"=>"???????? ????????????","city"=>"Saint Catherine"],
            // ["id"=>"331","governorate_id"=>"21","city_name_ar"=>"?????? ????????","city"=>"Abu Redis"],
            // ["id"=>"332","governorate_id"=>"21","city_name_ar"=>"?????? ??????????","city"=>"Abu Zenaima"],
            // ["id"=>"333","governorate_id"=>"21","city_name_ar"=>"?????? ??????","city"=>"Ras Sidr"],
            // ["id"=>"334","governorate_id"=>"22","city_name_ar"=>"?????? ??????????","city"=>"Kafr El Sheikh"],
            // ["id"=>"335","governorate_id"=>"22","city_name_ar"=>"?????? ?????????? ?????? ??????????","city"=>"Kafr El Sheikh Downtown"],
            // ["id"=>"336","governorate_id"=>"22","city_name_ar"=>"????????","city"=>"Desouq"],
            // ["id"=>"337","governorate_id"=>"22","city_name_ar"=>"??????","city"=>"Fooh"],
            // ["id"=>"338","governorate_id"=>"22","city_name_ar"=>"??????????","city"=>"Metobas"],
            // ["id"=>"339","governorate_id"=>"22","city_name_ar"=>"?????? ????????????","city"=>"Burg Al Burullus"],
            // ["id"=>"340","governorate_id"=>"22","city_name_ar"=>"??????????","city"=>"Baltim"],
            // ["id"=>"341","governorate_id"=>"22","city_name_ar"=>"???????? ??????????","city"=>"Masief Baltim"],
            // ["id"=>"342","governorate_id"=>"22","city_name_ar"=>"??????????????","city"=>"Hamol"],
            // ["id"=>"343","governorate_id"=>"22","city_name_ar"=>"????????","city"=>"Bella"],
            // ["id"=>"344","governorate_id"=>"22","city_name_ar"=>"????????????","city"=>"Riyadh"],
            // ["id"=>"345","governorate_id"=>"22","city_name_ar"=>"???????? ????????","city"=>"Sidi Salm"],
            // ["id"=>"346","governorate_id"=>"22","city_name_ar"=>"????????","city"=>"Qellen"],
            // ["id"=>"347","governorate_id"=>"22","city_name_ar"=>"???????? ????????","city"=>"Sidi Ghazi"],
            // ["id"=>"348","governorate_id"=>"23","city_name_ar"=>"???????? ??????????","city"=>"Marsa Matrouh"],
            // ["id"=>"349","governorate_id"=>"23","city_name_ar"=>"????????????","city"=>"El Hamam"],
            // ["id"=>"350","governorate_id"=>"23","city_name_ar"=>"??????????????","city"=>"Alamein"],
            // ["id"=>"351","governorate_id"=>"23","city_name_ar"=>"????????????","city"=>"Dabaa"],
            // ["id"=>"352","governorate_id"=>"23","city_name_ar"=>"??????????????","city"=>"Al-Nagila"],
            // ["id"=>"353","governorate_id"=>"23","city_name_ar"=>"???????? ??????????","city"=>"Sidi Brani"],
            // ["id"=>"354","governorate_id"=>"23","city_name_ar"=>"????????????","city"=>"Salloum"],
            // ["id"=>"355","governorate_id"=>"23","city_name_ar"=>"????????","city"=>"Siwa"],
            // ["id"=>"356","governorate_id"=>"23","city_name_ar"=>"????????????","city"=>"Marina"],
            // ["id"=>"357","governorate_id"=>"23","city_name_ar"=>"???????????? ??????????????","city"=>"North Coast"],
            // ["id"=>"358","governorate_id"=>"24","city_name_ar"=>"????????????","city"=>"Luxor"],
            // ["id"=>"359","governorate_id"=>"24","city_name_ar"=>"???????????? ??????????????","city"=>"New Luxor"],
            // ["id"=>"360","governorate_id"=>"24","city_name_ar"=>"????????","city"=>"Esna"],
            // ["id"=>"361","governorate_id"=>"24","city_name_ar"=>"???????? ??????????????","city"=>"New Tiba"],
            // ["id"=>"362","governorate_id"=>"24","city_name_ar"=>"??????????????","city"=>"Al ziynia"],
            // ["id"=>"363","governorate_id"=>"24","city_name_ar"=>"????????????????","city"=>"Al Bayadieh"],
            // ["id"=>"364","governorate_id"=>"24","city_name_ar"=>"????????????","city"=>"Al Qarna"],
            // ["id"=>"365","governorate_id"=>"24","city_name_ar"=>"??????????","city"=>"Armant"],
            // ["id"=>"366","governorate_id"=>"24","city_name_ar"=>"??????????","city"=>"Al Tud"],
            // ["id"=>"367","governorate_id"=>"25","city_name_ar"=>"??????","city"=>"Qena"],
            // ["id"=>"368","governorate_id"=>"25","city_name_ar"=>"?????? ??????????????","city"=>"New Qena"],
            // ["id"=>"369","governorate_id"=>"25","city_name_ar"=>"?????? ??????","city"=>"Abu Tesht"],
            // ["id"=>"370","governorate_id"=>"25","city_name_ar"=>"?????? ??????????","city"=>"Nag Hammadi"],
            // ["id"=>"371","governorate_id"=>"25","city_name_ar"=>"????????","city"=>"Deshna"],
            // ["id"=>"372","governorate_id"=>"25","city_name_ar"=>"??????????","city"=>"Alwaqf"],
            // ["id"=>"373","governorate_id"=>"25","city_name_ar"=>"??????","city"=>"Qaft"],
            // ["id"=>"374","governorate_id"=>"25","city_name_ar"=>"??????????","city"=>"Naqada"],
            // ["id"=>"375","governorate_id"=>"25","city_name_ar"=>"??????????","city"=>"Farshout"],
            // ["id"=>"376","governorate_id"=>"25","city_name_ar"=>"??????","city"=>"Quos"],
            // ["id"=>"377","governorate_id"=>"26","city_name_ar"=>"????????????","city"=>"Arish"],
            // ["id"=>"378","governorate_id"=>"26","city_name_ar"=>"?????????? ????????","city"=>"Sheikh Zowaid"],
            // ["id"=>"379","governorate_id"=>"26","city_name_ar"=>"??????","city"=>"Nakhl"],
            // ["id"=>"380","governorate_id"=>"26","city_name_ar"=>"??????","city"=>"Rafah"],
            // ["id"=>"381","governorate_id"=>"26","city_name_ar"=>"?????? ??????????","city"=>"Bir al-Abed"],
            // ["id"=>"382","governorate_id"=>"26","city_name_ar"=>"????????????","city"=>"Al Hasana"],
            // ["id"=>"383","governorate_id"=>"27","city_name_ar"=>"??????????","city"=>"Sohag"],
            // ["id"=>"384","governorate_id"=>"27","city_name_ar"=>"?????????? ??????????????","city"=>"Sohag El Gedida"],
            // ["id"=>"385","governorate_id"=>"27","city_name_ar"=>"??????????","city"=>"Akhmeem"],
            // ["id"=>"386","governorate_id"=>"27","city_name_ar"=>"?????????? ??????????????","city"=>"Akhmim El Gedida"],
            // ["id"=>"387","governorate_id"=>"27","city_name_ar"=>"??????????????","city"=>"Albalina"],
            // ["id"=>"388","governorate_id"=>"27","city_name_ar"=>"??????????????","city"=>"El Maragha"],
            // ["id"=>"389","governorate_id"=>"27","city_name_ar"=>"??????????????","city"=>"almunsha'a"],
            // ["id"=>"390","governorate_id"=>"27","city_name_ar"=>"?????? ????????????","city"=>"Dar AISalaam"],
            // ["id"=>"391","governorate_id"=>"27","city_name_ar"=>"????????","city"=>"Gerga"],
            // ["id"=>"392","governorate_id"=>"27","city_name_ar"=>"?????????? ??????????????","city"=>"Jahina Al Gharbia"],
            // ["id"=>"393","governorate_id"=>"27","city_name_ar"=>"????????????","city"=>"Saqilatuh"],
            // ["id"=>"394","governorate_id"=>"27","city_name_ar"=>"??????","city"=>"Tama"],
            // ["id"=>"395","governorate_id"=>"27","city_name_ar"=>"????????","city"=>"Tahta"],
            // ["id"=>"396","governorate_id"=>"27","city_name_ar"=>"????????????","city"=>"Alkawthar"]
        ];

        foreach ($cities as $city) {
            City::create(
                [
                    'governorate_id' => $city['governorate_id'],
                    'name' => $city['city'],
                ],
            );
        }
    }
}
