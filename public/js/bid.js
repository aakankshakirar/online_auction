$(document).ready(function () {
    // Handle click event on bid button
    $('.bid-btn').click(function () {
        var itemId = $(this).data('item-id');
        $('#itemId').val(itemId) // Update item ID input value
        $('#bidModal').modal('show'); // Show bid modal
    });

    // Handle form submission
    $('#bidForm').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        let itemId = $('#itemId').val();

        $.post($(this).attr('action'), formData)
            .done(function (response) {
                // Success: Hide modal and display success message
                $('#bidModal').modal('hide');
                $('#successMessage').text('Bid placed successfully!');
                $('#successMessage').fadeIn().delay(3000).fadeOut();

                $('#highest_bids_' + itemId).text('Highest Bid: ' + response.highest_bids);
                $('#total_bids_' + itemId).text('Total Bids: ' + response.total_bids);
                $('#placed_bids_' + itemId).text('Placed Bids: ' + response.placed_bids);
                $('#bidAmount').val('');

            })
            .fail(function (error) {
                // Error: Display error message
                alert('Failed to place bid. Please try again.');

            });
    });
});


// JavaScript code to fetch and update highest bids every 5 seconds
function fetchHighestBids() {
    // Make AJAX request to fetch highest bids for each item
    $.ajax({
        type: 'GET',
        url: '/items/highest-bids', 
        success: function (response) {
            // Update UI with the latest highest bids
            Object.keys(response).forEach(function (itemId) {
                var highestBid = response[itemId];
                if(highestBid == null || highestBid == 0){
                    highestBid = 'No Bids Yet';
                }
                $('#highest_bids_' + itemId).text('Highest Bid: ' + highestBid);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching highest bids:', error);
        }
    });
}

// Call fetchHighestBids function initially and every 5 seconds
fetchHighestBids(); // Call initially
setInterval(fetchHighestBids, 5000); // Call every 5 seconds

$('#determineWinner').click(function () {

    $.ajax({
        type: 'GET',
        url: '/items/determine-winner/', 
        success: function (response) {
            alert('Winner determined successfully!');
        },
        error: function (xhr, status, error) {
            console.error('Error fetching highest bids:', error);
        }
    });
});
