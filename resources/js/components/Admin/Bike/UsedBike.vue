<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container bg-info">
        <div class="card-header">
            <h3 class="card-title center">Bike Sell an item or service</h3>
        </div>

               

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="" @submit.prevent="postbike" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="category"  class="col-sm-2 col-form-label" >Category *</label>
                     <div class="col-sm-10">
                       <select :class="{'is-invalid' :form.errors.has('category')}" id="category" v-model="form.category" 
                        class="form-control">
                        <option disabled value="">Select One</option>
                        <option v-for="categoryname in category123" :value="categoryname._id">{{categoryname.categoryname}}
                            
                        </option>

                    </select>
                    <has-error :form="form" field="gender"></has-error>
                </div> 
                </div> 
                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input v-model="form.location" type="location" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('location') }" id="location" placeholder="Location">
                        <has-error :form="form" field="location"></has-error>
                    </div>

                </div>
                 <div class="form-group row">
                     <label for="exampleInputFile" class="col-sm-2 col-form-label">Add Photo</label>
                     <div class="col-sm-10">
                      <div class="custom-file">
                        <input type="file" :class="{'is-invalid' :form.errors.has('photo')}" id="photo"  class="custom-file-input"   @change="changephoto($event)">
                           
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <has-error :form="form" field="photo" ></has-error>
                      </div>
                      </div>
                      
                     <img :src="form.userimage" alt="" width="80px">
                    </div>
                <div class="form-group row">
                    <label for="checkbox" class="col-sm-2 col-form-label">Condition</label>
                    <div class="checkbox">

                        <label class="form-check-label">
                            <input type="radio" name="condition" id= "Used" value= "used" v-model="form.condition" >Used</label>

                        <label class="radio-inline">
                            <input type="radio" name="condition" id= "New" v-model ="form.condition" value ="new">New</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="checkbox" class="col-sm-2 col-form-label">Bike Type</label>
                    <div class="checkbox">

                        <label class="radio-inline">
                            <input type ="radio" name = "biketype" id="Motorbikes" v-model="form.biketype" value="Motorbikes" checked>Motorbikes</label>

                        <label class="radio-inline">
                    <input type ="radio" name = "biketype" id="Scooter" value="scooter" v-model="form.biketype" >Scooter & E-Bikes</label>
                    </div>
                </div>
    

                 <div class="form-group row">
                    <label for="bikebrand"  class="col-sm-2 col-form-label">Brand *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikebrand')}" id="bikebrand"  v-model="form.bikebrand" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="brandrname in bikebrand1" :value="brandrname._id" >{{brandrname.bikebrand}}</option>
                     
                    </select>
                     <has-error :form="form" field="brand" ></has-error>
                </div>
                  </div>   
               
               <div class="form-group row">
                    <label for="bikemodel"  class="col-sm-2 col-form-label">Model *</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodel')}" id="bikemodel"  v-model="form.bikemodel" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelname in bikemodel2" :value="bikemodelname._id" >{{bikemodelname.bikemodel}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodel" ></has-error>
                </div>
                  </div>  
                <div class="form-group row">
                    <label for="bikeversion"  class="col-sm-2 col-form-label">Version</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikeversion')}" id="bikeversion"  v-model="form.bikeversion" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikeversionname in bikeversion3" :value="bikeversionname._id" >{{bikeversionname.bikeversion}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikeversion" ></has-error>
                </div>
                  </div> 
                   <div class="form-group row">
                    <label for="bikemodelyear"  class="col-sm-2 col-form-label">Model Year</label>
                <div class="col-sm-10">
                    <select  :class="{'is-invalid' :form.errors.has('bikemodelyear')}" id="bikemodelyear"  v-model="form.bikemodelyear" class="form-control" >
                        <option disabled value="">Select One</option>
                      <option v-for="bikemodelyearname in modelyear4" :value="bikemodelyearname._id" >{{bikemodelyearname.modelyear}}</option>
                     
                    </select>
                     <has-error :form="form" field="bikemodelyear" ></has-error>
                </div>
                  </div> 
                 <div class="form-group row">
                    <label for="kilometer_run" class="col-sm-2 col-form-label">Kilometers run (km)</label>
                    <div class="col-sm-10">
                        <input v-model="form.kilometerrun" type="number" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('kilometerrun') }" id="kilometerrun" placeholder="kilometer_run">
                        <has-error :form="form" field="kilometerrun"></has-error>
                    </div>
                </div> 
   
                  <div class="form-group row">
                    <label for="used" class="col-sm-2 col-form-label">Used time</label>
                    <div class="col-sm-10">
                        <input v-model="form.usedtime" type="date" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('usedtime') }" id="usedtime" placeholder="Usedtime">
                        <has-error :form="form" field="usedtime"></has-error>
                    </div>

                </div>  
                 <div class="form-group row">
                    <label for="engine_capacity" class="col-sm-2 col-form-label">Engine capacity (cc)  </label>
                    <div class="col-sm-10">
                        <input v-model="form.engine_capacity" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('engine_capacity') }" id="engine_capacity" placeholder="Capacity">
                        <has-error :form="form" field="engine_capacity"></has-error>
                    </div>

                </div>  
              <!-- <div class="form-group row">
                    <label for="checkbox" class="col-sm-2 col-form-label">Starting Method</label>
                    <div class="checkbox">

                        <label class="form-check-label">
                            <input type="radio" name="startingmethod" id= "Auto" value= "auto" v-model ="form.startingmethod" >Auto</label>

                        <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Manual" v-model ="form.startingmethod" value ="manual">Manual</label>

                             <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Self" v-model ="form.startingmethod" value ="self">Self</label>

                             <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Kick" v-model ="form.startingmethod" value ="kick">Kick</label>

                            <label class="radio-inline">
                            <input type="radio" name="startingmethod" id= "Both" v-model ="form.startingmethod" value ="both">Both</label>
                    </div>
                </div>  -->

              
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                   <div class="col-sm-10">
                       
                        <textarea v-model="form.description" style="resize:both" placeholder="Description"></textarea>
                           
                        <has-error :form="form" field="description"></has-error>
                    </div>

                </div>
                 

                    <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price(Taka)</label>
                    <div class="col-sm-5">
                        <input v-model="form.price" type="number" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('price') }" id="price"
                            placeholder="Price">
                          
                        <has-error :form="form" field="price"></has-error>
                    </div>
                       <label class="checkbox-inline">
                        <input type="checkbox" value="" v-model ="form.price">Negotiable
                    </label>
                     
                </div>
                <br>
                    <div class="form-group row">
                    <label for="contactdetails" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                        <input v-model="form.contactdetails" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('contactdetails') }" id="contactdetails" placeholder="Contact">
                        <has-error :form="form" field="contactdetails"></has-error>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input v-model="form.phone" type="number" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('phone') }" id="phone" placeholder="Phone">
                        <has-error :form="form" field="phone"></has-error>
                    </div>
                </div>
              
                
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Add Post</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Bike',
        data() {
            return {
                form: new Form({
                    location: '',
                    bikebrand: '',
                    category: '',
                    bikemodel: '',
                    usedtime: '',
                    bikeversion: '',
                    photo: '',
                    condition: '',
                    biketype: '',
                    startingmethod: '',
                    // kilometers: '',
                    engine_capacity: '',
                    description: '',
                    price: '',
                    contactdetails: '',
                    phone: '',
                }),
                bikebrand1: null,
                category123: null,
                bikemodel2: null,
                bikeversion3: null,
                modelyear4: null,

            }
        },
        mounted() {
            axios
                .get('http://127.0.0.1:8000/en/bikebrand')
                .then(response => {
                    (this.bikebrand1 = response.data.bikebrand)
                    //console.log(response);

                });
            axios
                .get('http://127.0.0.1:8000/en/category')
                .then(response => {
                    (this.category123 = response.data.category)
                    //console.log(response);

                });
                axios
                .get('http://127.0.0.1:8000/en/bikemodel')
                .then(response => {
                    (this.bikemodel2 = response.data.bikemodel)
                    //console.log(response);

                });
                axios
                .get('http://127.0.0.1:8000/en/bikemodelyear')
                .then(response => {
                    (this.modelyear4 = response.data.modelyear)
                    //console.log(response);

                });

                axios
                .get('http://127.0.0.1:8000/en/bikeversion')
                .then(response => {
                    (this.bikeversion3 = response.data.bikeversion)
                    console.log(response);

                });
        },
        methods: {
            postbike() {
                  console.log(this.form);
                this.form.post("en/bike", this.form)
                    .then(response => {
                        [toastr.success('Add Post  Successfully')], [this.$router.push({
                            name: ''
                        })]
                        if (response.data.token) {
                            localStorage.setItem("token", response.data.token);

                        }
                    })
                    .catch(response => {
                        console.log(response);
                        [toastr.warning("Sorry Try Again"), ]
                    });
            },
            changephoto(event) {
                let file = event.target.files[0];
                let reader = new FileReader();
                reader.onload = event => {
                        this.form.photo = event.target.result
                    },
                    reader.readAsDataURL(file);
            }

            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
        }
    }

</script>