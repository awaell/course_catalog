$(document).ready(function () {
    var baseUrl = $('#base_url').val();

    // Function to recursively count courses in a category and its subcategories
    function countCoursesInCategory(category) {
        var count = category.count_of_courses;
        if (category.subcategories && category.subcategories.length > 0) {
            $.each(category.subcategories, function (index, subcategory) {
                count += countCoursesInCategory(subcategory); // Recursively count courses in subcategories
            });
        }
        return count;
    }

    // Function to generate category links
    function generateCategoryLinks(categories, parentElement) {
        var categoryLinks = $('<ul class="category-list"></ul>');

        $.each(categories, function (index, category) {
            var categoryItem = $('<li></li>');
            var count = countCoursesInCategory(category); // Count courses in the category and its subcategories
            var categoryLink = $('<a href="#" class="category-link" data-name="' + category.name + '" data-id="' + category.id + '">' + category.name + ' (' + count + ')</a>');
            categoryItem.append(categoryLink);

            if (category.subcategories && category.subcategories.length > 0) {
                var subcategoryList = $('<ul class="subcategory-list"></ul>');
                generateCategoryLinks(category.subcategories, subcategoryList); // Recursively generate subcategory links
                categoryItem.append(subcategoryList);
            }

            categoryLinks.append(categoryItem);
        });

        parentElement.append(categoryLinks);
    }

    // Fetch all categories
    $.ajax({
        url: baseUrl + 'api.php/categories',
        method: 'GET',
        success: function (response) {
            var categoryList = $('#category-list');
            var categories = JSON.parse(response);

            // Generate category links
            generateCategoryLinks(categories, categoryList);

            // Add click event handler for category links
            $('.category-link').click(function () {
                var categoryId = $(this).data('id');

                // Make an AJAX call to fetch relevant courses for the selected category
                $.ajax({
                    url: baseUrl + 'api.php/courses/?category_id=' + categoryId,
                    method: 'GET',
                    success: function (response) {
                        var courseCards = $('#course-cards');
                        courseCards.empty(); // Clear existing course cards

                        // Populate course cards with courses fetched for the selected category
                        $.each(JSON.parse(response), function (index, course) {
                            var courseCard = $('<div class="col-xs-12 col-sm-6 col-md-4 mb-4"></div>');
                            var card = $('<div class="card"></div>');
                            var cardImg = $('<img class="card-img-top" src="' + course.image_preview + '" alt="' + course.title + '">');
                            var cardBody = $('<div class="card-body"></div>');
                            var cardTitle = $('<h5 class="card-title"></h5>').text(course.title);
                            var cardText = $('<p class="card-text"></p>').text(course.description);
                            var categoryLabel = $('<span class="category-label"></span>').text(course.main_category_name);

                            cardBody.append(cardTitle, cardText);
                            card.append(cardImg, cardBody, categoryLabel);
                            courseCard.append(card);
                            courseCards.append(courseCard);
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error if any
                        console.error(xhr.responseText);
                    }
                });
            });
        }
    });

    // Fetch all courses (initially all courses)
    $.ajax({
        url: baseUrl + 'api.php/courses',
        method: 'GET',
        success: function (response) {
            var courseCards = $('#course-cards');
            $.each(JSON.parse(response), function (index, course) {
                var courseCard = $('<div class="col-md-4 mb-4"></div>');
                var card = $('<div class="card"></div>');
                var cardImg = $('<img class="card-img-top" src="' + course.preview + '" alt="' + course.name + '">');
                var cardBody = $('<div class="card-body"></div>');
                var cardTitle = $('<h5 class="card-title"></h5>').text(course.name);
                var cardText = $('<p class="card-text"></p>').text(course.description);
                var categoryLabel = $('<span class="category-label"></span>').text(course.main_category_name);

                cardBody.append(cardTitle, cardText);
                card.append(cardImg, cardBody, categoryLabel);
                courseCard.append(card);
                courseCards.append(courseCard);
            });
        }
    });
});
