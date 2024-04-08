 <!-- Bid Modal -->
 <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form id="bidForm" action="{{ route('bids.store') }}" method="POST">
                 @csrf
                 <input type="hidden" name="item_id" id="itemId">
                 <div class="modal-header">
                     <h5 class="modal-title" id="bidModalLabel">Place Bid</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="bidAmount">Bid Amount:</label>
                         <input type="number" class="form-control" id="bidAmount" name="amount" min="0.01"
                             step="0.01" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Submit Bid</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
