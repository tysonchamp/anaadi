<div class="breadcumb-wrapper" data-bg-src="<?= base_url() ?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Book your Tour</h3>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 p-2 px-2">
                <div class="mt-0 title-area mb-10">
                    <h2 class="sec-title pe-xl-5 me-xl-5 heading text-end"> Book Your Tour </h2>


                    <?php //print_r($tour);
                    // print_r($tourcategory);
                    ?>
                    <?php $error = $this->session->flashdata('error');
                    if ($error) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <?php $success = $this->session->flashdata('success');
                    if ($success) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <form action="<?=base_url('Booktour/booknow') ?>" method="POST" class="book-form style2 ajax-book">

                    <div class="row">
                        <div id="error_div" class="col-12">
                        </div>
                      
                        <h4 class="sec-title pe-xl-5 me-xl-5 heading"> Tour Booking </h4>
                        <hr>


                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Departure City:</label>
                            <select class="form-select" id="departure_city" name="departure_city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'GOA') ? "selected" : "" ?>>GOA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'SHIMLA') ? "selected" : "" ?>>SHIMLA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'Bangaluru') ? "selected" : "" ?>>Bangaluru</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'DARJEELING') ? "selected" : "" ?>>DARJEELING</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'UDAIPUR') ? "selected" : "" ?>>UDAIPUR</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'MANALI') ? "selected" : "" ?>>MANALI</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'Andaman and Nicobar') ? "selected" : "" ?>>Andaman and Nicobar</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'DELHI') ? "selected" : "" ?>>DELHI</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Arrival City:</label>
                            <select class="form-select" id="arrival_city" name="arrival_city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Hampi') ? "selected" : "" ?>>Hampi</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Bangaluru') ? "selected" : "" ?>>Bangaluru</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'COORG') ? "selected" : "" ?>>COORG</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Kuala Lumpur') ? "selected" : "" ?>>Kuala Lumpur</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Mauritius') ? "selected" : "" ?>>Mauritius</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Kerala') ? "selected" : "" ?>>Kerala</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Tamil Nadu') ? "selected" : "" ?>>Tamil Nadu</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Rajasthan') ? "selected" : "" ?>>Rajasthan</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Days</label>
                            <select class="form-select" id="howmany_days" name="howmany_days">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '3') ? "selected" : "" ?> value="3">3</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '4') ? "selected" : "" ?> value="4">4</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '5') ? "selected" : "" ?> value="5">5</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '7') ? "selected" : "" ?> value="7">7</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Night</label>
                            <select class="form-select" id="howmany_night" name="howmany_night">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '2') ? "selected" : "" ?> value="2">2</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '3') ? "selected" : "" ?> value="3">3</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '4') ? "selected" : "" ?> value="4">4</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '5') ? "selected" : "" ?> value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="departure_date">Departure Date:</label>
                            <input type="datetime-local" id="departure_date" name="departure_date">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="return_date">Return Date (Optional):</label>
                            <input type="datetime-local" id="return_date" name="return_date">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="passengers">Number of Passengers:</label>
                            <input type="number" id="passengers" name="passengers" value="1" min="1">

                        </div>

                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Category</label>
                            <select class="form-select" id="category4" name="category">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['category_id'] == 1) ? "selected" : "" ?> value="1">India</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['category_id'] == 2) ? "selected" : "" ?> value="2">World</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Continent/State</label>
                            <select class="form-select" id="tourcategory" name="tourcategory">
                                <option value="0">-Select-</option>
                                <?php if (isset($tourcategory)) {
                                    foreach ($tourcategory as $item) { ?>
                                        <option <?= (isset($tour) && count($tour) > 0 && $tour['tourcategory_id'] == $item['id']) ? "selected" : "" ?> value="<?= $item['id'] ?>"><?= $item['sub_category'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label class="p-1 mb-1 fs-16">Tour Package</label>
                            <select class="form-select" id="tour" name="tour">
                                <?php if (isset($tour) && count($tour) > 0) { ?>
                                    <option data-price="<?= $tour['price'] ?>" value="<?= $tour['id'] ?>"><?= $tour['title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Hotel</label>
                            <select class="form-select" id="hotel" name="hotel">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="Standard">Standard</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Deluxe">Deluxe</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Super Deluxe">Super Deluxe</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Luxury">Luxury</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="3 Star">3 Star</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="4 Star">4 Star</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="5 Star">5 Star</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Meals</label>
                            <select class="form-select" id="meals" name="meals">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="CP">CP</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="MAP">MAP</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="AP">AP</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Types of Transfers</label>
                            <select class="form-select" id="typeof_transfers" name="typeof_transfers">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 1) ? "selected" : "" ?> value="1">Shared Transfers</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 2) ? "selected" : "" ?> value="2">Private Transfers</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 3) ? "selected" : "" ?> value="3">Airport Chauffeur Services</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 4) ? "selected" : "" ?> value="4">Touristic Transfers</option>
                            </select>
                        </div>

                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">No. of Adults</label>
                            <input type="number" class="form-control" name="adults" id="adults" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="p-1 mb-1 fs-16">No. of Children</label>
                            <input type="number" class="form-control" name="children" id="children" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-2 mt-3">
                            <span class="d-flex align-items-center gap-2 p-2" style="border-radius: 8px; display:<?= (isset($tour) && count($tour) > 0) ? "block;" : "none" ?>;font-size: 16px;font-weight:600;border: 1px solid lightgrey;" class="tour_amount mb-0 p-2 text-dark shadow-sm" id="amount" placeholder="0">
                                <label class="text-danger p-0 font-bold mb-0 px-2">Amount</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <?= (isset($tour) && count($tour) > 0) ? "<i class='fa fa-indian-rupee'></i>
                                    <input type='text' name= 'price' value=" . $tour['price'] . "> <span style='font-size: 13px; line-height: 16px;'>/ Per Person</span> " : "" ?>
                                </div>
                            </span>
                        </div>

                        
                    <h4 class="sec-title pe-xl-5 me-xl-5 heading">Tour Booking</h4>
                    <hr>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Name</label>
                            <input type="text" class="form-control" name="name" id="name4" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Email</label>
                            <input type="email" class="form-control" name="email" id="email4" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone4" placeholder="">
                        </div>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Address</label>
                            <input type="text" class="form-control" name="address" id="address4" placeholder="">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Type of Tour</label>
                            <select class="form-select" id="typeof_tour" name="typeof_tour">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="1">Sightseeing Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="2">Adventure Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="3">Historical & Cultural Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="4">Specialty Tours</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Country</label>

                            <select class="form-select" id="country" name="country">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option value="United States">United States</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antartica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo">Congo, the Democratic Republic of the</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia (Hrvatska)</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="France Metropolitan">France, Metropolitan</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                <option value="Holy See">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran (Islamic Republic of)</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia, Federated States of</option>
                                <option value="Moldova">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint LUCIA</option>
                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                <option value="Span">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="St. Helena">St. Helena</option>
                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Viet Nam</option>
                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>

                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16"> City:</label>

                            <select class="form-select" id="city" name="city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'GOA') ? "selected" : "" ?>>GOA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'SHIMLA') ? "selected" : "" ?>>SHIMLA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'COORG') ? "selected" : "" ?>>COORG</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'DARJEELING') ? "selected" : "" ?>>DARJEELING</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'UDAIPUR') ? "selected" : "" ?>>UDAIPUR</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'MANALI') ? "selected" : "" ?>>MANALI</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'Andaman and Nicobar') ? "selected" : "" ?>>Andaman and Nicobar</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'DELHI') ? "selected" : "" ?>>DELHI</option>
                            </select>
                        </div>
                        <div class="form-btn col-12 mt-24"><button id="booktour" type="submit" class="th-btn">Book Now</button></div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
        <div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="<?= base_url() ?>assets/img/shape/shape_2_1.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="<?= base_url() ?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="<?= base_url() ?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="<?= base_url() ?>assets/img/shape/shape_2_4.png" alt="shape"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $(".book-form select[name='category']").change(function() {
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            var params = {};
            params.category_id = $(this).val();
            var url = "<?= base_url('Tour/getTourCategory') ?>";
            if ($(this).val() == 0) {
                $(".book-form select[name='tourcategory']").empty();
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.error == 1) {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>" + data.error_message + "</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    } else {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tourcategory']").empty();
                        $(".book-form select[name='tourcategory']").append("<option value='0'>-Select-</option>");
                        for (var i = 0; i < records.length; i++) {
                            $(".book-form select[name='tourcategory']").append("<option value='" + records[i].id + "'>" + records[i].sub_category + "</option>");
                        }
                    }
                },
                error: function(data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function() {
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tourcategory']").change(function() {
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            var params = {};
            params.category_id = $(".book-form select[name='category']").val();
            params.tourcategory_id = $(this).val();
            var url = "<?= base_url('Tour/getTours') ?>";
            if ($(this).val() == 0) {
                $(".book-form select[name='tourcategory']").empty();
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.error == 1) {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>" + data.error_message + "</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    } else {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tour']").empty();
                        $(".book-form select[name='tour']").append("<option value='0'>-Select-</option>");
                        for (var i = 0; i < records.length; i++) {
                            $(".book-form select[name='tour']").append("<option data-price='" + records[i].price + "' value='" + records[i].id + "'>" + records[i].title + "</option>");
                        }
                    }
                },
                error: function(data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function() {
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tour']").change(function() {
            $(".book-form .tour_amount").css('display', 'inline');

            function toCurrencyString(price) {
                price = parseInt(price);
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }

            var price = $(this).find('option:selected').attr('data-price');
            $("#amount").html("<i class='fa fa-indian-rupee'></i>" + toCurrencyString(price) + " / Per Person");
        });

    });
</script>