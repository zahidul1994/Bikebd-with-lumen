<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" @submit.prevent="addStatus">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gender">Status</label>
                     <input  v-model="form.status_name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('status_name') }" id="gender" placeholder="Status Name">
                        <has-error :form="form" field="status_name"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <router-link to="/superadmin/statuslist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'New',
      created () {
            document.title = "Create Status";
        },
        data(){
        return {
          form: new Form({
            status_name:'',
          })
          
        }
    },
    
    methods: {
      addStatus(){
        this.form.post('/superadmin/createstatus')
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Status Create Successfull')],[this.$router.push('/superadmin/statuslist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>