$(document).ready(function() {
    // Define baseUrl variable first
    var baseUrl = $('meta[name="base-url"]').attr('content') || window.location.origin + '/anaadi/';
    
    // Function to handle category change
    $('#tour_category').on('change', function() {
        const categoryId = $(this).val();
        
        // Reset dependent dropdowns
        $('#continent_id').html('<option value="0">Select Continent</option>');
        $('#country').html('<option value="0">Country/State</option>');
        
        if (categoryId == 1) { // India
            // Hide continent dropdown, show country dropdown
            $('#continent_container').hide();
            $('#country_container').show();
            
            // Load states for India
            loadTourCategories(categoryId);
        } else if (categoryId == 2) { // International
            // Show continent dropdown
            $('#continent_container').show();
            $('#country_container').show();
            
            // Load continents
            loadContinents();
        } else {
            // Hide continent dropdown, show empty country dropdown
            $('#continent_container').hide();
            $('#country_container').show();
        }
    });
    
    // Function to handle continent change
    $('#continent_id').on('change', function() {
        const continentId = $(this).val();
        
        // Reset country dropdown
        $('#country').html('<option value="0">Country</option>');
        
        if (continentId > 0) {
            // Hide continent error if shown
            $('.continent-error').hide();
            
            // Load countries for selected continent
            loadCountriesByContinent(continentId);
        }
    });
    
    // Function to load continents via AJAX
    function loadContinents() {
        $.ajax({
            url: baseUrl + 'Customizeform/getContinents',
            type: 'POST',
            data: {
                category_id: 2 // International
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let options = '<option value="0">Select Continent</option>';
                    
                    $.each(response.data, function(index, continent) {
                        options += '<option value="' + continent.id + '">' + continent.continent + '</option>';
                    });
                    
                    $('#continent_id').html(options);
                }
            },
            error: function() {
                console.error('Error fetching continents');
            }
        });
    }
    
    // Function to load tour categories (states) for India
    function loadTourCategories(categoryId) {
        $.ajax({
            url: baseUrl + 'Customizeform/getTourCategories',
            type: 'POST',
            data: {
                category_id: categoryId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let options = '<option value="0">Select State</option>';
                    
                    $.each(response.data, function(index, category) {
                        options += '<option value="' + category.country + '">' + category.country + '</option>';
                    });
                    
                    $('#country').html(options);
                }
            },
            error: function() {
                console.error('Error fetching tour categories');
            }
        });
    }
    
    // Function to load countries by continent
    function loadCountriesByContinent(continentId) {
        $.ajax({
            url: baseUrl + 'Customizeform/getCountriesByContinent',
            type: 'POST',
            data: {
                continent_id: continentId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let options = '<option value="0">Select Country</option>';
                    
                    $.each(response.data, function(index, country) {
                        options += '<option value="' + country.country + '">' + country.country + '</option>';
                    });
                    
                    $('#country').html(options);
                }
            },
            error: function() {
                console.error('Error fetching countries');
            }
        });
    }
});
