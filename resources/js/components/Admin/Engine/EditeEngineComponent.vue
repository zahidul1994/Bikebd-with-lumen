<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Engine</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateEngine">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="enginetype">Engine Name</label>
                     <input  v-model="form.enginetype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('enginetype') }" id="enginetype" placeholder="Engine Type Name">
                        <has-error :form="form" field="enginetype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/enginelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditEngine',
       created () {
            document.title = "Edit Engine";
        },
      mounted(){
          axios.get(`/admin/editeengine/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.engine)
          })
      },
        data(){
        return {
          form: new Form({
            enginetype:'',
          })
          
        }
    },
    
    
    methods: {
      updateEngine(){
        this.form.patch('/admin/updateengine/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Engine Update Successfull')],[this.$router.push('/admin/enginelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>