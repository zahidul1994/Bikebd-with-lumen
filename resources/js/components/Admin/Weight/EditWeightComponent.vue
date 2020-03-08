<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Wight</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateWight">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="weight">Weight</label>
                     <input  v-model="form.weight" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('weight') }" id="weight" placeholder="Weight">
                        <has-error :form="form" field="weight"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/weightlist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditWeight',
       created () {
            document.title = "Edit Weight";
        },
      mounted(){
          axios.get(`/admin/editweight/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.weight)
          })
      },
        data(){
        return {
          form: new Form({
            weight:'',
          })
          
        }
    },
    
    
    methods: {
      updateWight(){
        this.form.patch('/admin/updateweight/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Weight Update Successfull')],[this.$router.push('/admin/weightlist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>