     <!-- lease modal  -->
     <div class="modal fade" id="{{'vh'.$vehicle->id}}" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">{{ $vehicle->make . ' ' . $vehicle->model }}</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="/leaserequests" method="POST"> @csrf
                     <div class="modal-body">
                         <label for="startdate">Start Date</label>
                         <input type="date" id="startdate" name="startdate">
                         <br>
                         <label>Duration</label>
                         <br>
                         <label for="years">Years</label>
                         <input type="number" id="years" name="years">
                         <br>
                         <label for="months">Months</label>
                         <input type="number" id="months" name="months">
                         <br>
                         <label for="weeks">Weeks</label>
                         <input type="number" id="weeks" name="weeks">
                         <br>
                         <label for="days">Days</label>
                         <input type="number" id="days" name="days">
                         <br>
                         <label for="enddate">End Date</label>
                         <input type="date" id="enddate" name="enddate">
                         <h2>Total Cost XXX</h2>

                         <div style='display: none'>
                             {{-- todo calculate duration --}}
                             <input type="text" name='duration' value='100'>
                             <input type="text" name='user_id' value='{{auth()->user()->id}}'>
                             <input type="text" name='vehicle_id' value='{{$vehicle->id}}'>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-primary">Confirm Lease Request</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
