<!-- Modal -->
<div class="modal fade" id="PicketSchedule" tabindex="-1" aria-labelledby="PicketScheduleLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="PicketScheduleLabel">Modal title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <div id="page">
                   <form id="form-submit">
                       @csrf
                       <input type="hidden" id="id-picket" class="form-control" name="id_picket" />
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-outline mb-4">
                                   <label class="form-label" for="senin">Senin</label>
                                   <select class="form-select select2-on" aria-label="Default select example" multiple="multiple" name="senin[]">
                                       <optgroup label="Karyawan Magang">

                                       </optgroup>
                                   </select>
                                   <span id="senin_error" class="error">Lorem ipsum dolor sit amet.</span>
                               </div>
                               <div class="form-outline mb-4">
                                   <label class="form-label" for="selasa">Selasa</label>
                                   <select class="form-select select2-on" aria-label="Default select example" multiple="multiple" name="selasa[]">
                                       <optgroup label="Karyawan Magang">

                                       </optgroup>
                                   </select>
                                   <span id="selasa_error" class="error">Lorem ipsum dolor sit amet.</span>
                               </div>
                               <div class="form-outline mb-4">
                                   <label class="form-label" for="rabu">Rabu</label>
                                   <select class="form-select select2-on" aria-label="Default select example" multiple="multiple" name="rabu[]">
                                       <optgroup label="Karyawan Magang">

                                       </optgroup>
                                   </select>
                                   <span id="rabu_error" class="error">Lorem ipsum dolor sit amet.</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-outline mb-4">
                                   <label class="form-label" for="kamis">Kamis</label>
                                   <select class="form-select select2-on" aria-label="Default select example" multiple="multiple" name="kamis[]">
                                       <optgroup label="Karyawan Magang">

                                       </optgroup>
                                   </select>
                                   <span id="kamis_error" class="error">Lorem ipsum dolor sit amet.</span>
                               </div>
                               <div class="form-outline mb-4">
                                   <label class="form-label" for="jumat">Jumat</label>
                                   <select class="form-select select2-on" aria-label="Default select example" multiple="multiple" name="jumat[]">
                                       <optgroup label="Karyawan Magang">

                                       </optgroup>
                                   </select>
                                   <span id="jumat_error" class="error">Lorem ipsum dolor sit amet.</span>
                               </div>
                           </div>
                       </div>

                       <!-- Submit button -->
                       <button id="btn-form" class="btn btn-primary btn-block mb-4">Simpan</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>