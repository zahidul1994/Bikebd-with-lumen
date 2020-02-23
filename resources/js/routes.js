//Superadmin area start
import SuperAdminLogin from './components/SuperAdmin/Superadminlogin.vue'
import SuperAdminDashboard from './components/SuperAdmin/Superadmindashboard.vue'

//children
import Accounttype from './components/SuperAdmin/Accounttype/Accounttype.vue'
import AddAccounttype from './components/SuperAdmin/Accounttype/CreateAccounttype.vue'
import EditAccounttype from './components/SuperAdmin/Accounttype/EditAccounttype.vue'
//Accounttype area end

import AccountPermission from './components/SuperAdmin/Permission/Permission.vue'
import AddAccountPermission from './components/SuperAdmin/Permission/CreatePermission.vue'
import EditAccountPermission from './components/SuperAdmin/Permission/EditPermission.vue'
//Permission  area end
import AccountRole from './components/SuperAdmin/Accountrole/AccountRole.vue'
import AddAccountRole from './components/SuperAdmin/Accountrole/CreateAccountRole.vue'
import EditAccountRole from './components/SuperAdmin/Accountrole/EditAccountRole.vue'
//AccountRole area end


//gender area start
import Gender from './components/SuperAdmin/Gender/GenderComponent.vue'
import AddGender from './components/SuperAdmin/Gender/CreateGenderComponent.vue'
import EditGender from './components/SuperAdmin/Gender/EditGenderComponent.vue'
//gender area end
//Status area start
import Status from './components/SuperAdmin/Status/Status.vue'
import AddStatus from './components/SuperAdmin/Status/Create.vue'
import EditStatus from './components/SuperAdmin/Status/Edit.vue'
//Status area end
//Account  area start
import AccountList from './components/SuperAdmin/AdminAccount/AccountList.vue'
import AddAccount from './components/SuperAdmin/AdminAccount/CreateAccount.vue'
import EditAccount from './components/SuperAdmin/AdminAccount/EditAccount.vue'
//Account area end

//Superadmin area start

//Admin area start
import AdminLogin from './components/Admin/Adminlogin.vue'
import AdminDashboard from './components/Admin/Admindashboard.vue'

//Profile  area start
import Adminprofile from './components/Admin/Profile/Adminprofile.vue'
import EditAdminprofile from './components/Admin/Profile/Editadminprofile.vue'
import Shoppayment from './components/Admin/Profile/Shoppaymentview.vue'

//Profile area end
//division  area start
import DivisionList from './components/Admin/Division/DivisionComponent.vue'
import CreateDivisionList from './components/Admin/Division/CreateDivisionComponent.vue'
import EditDivisionList from './components/Admin/Division/EditDivisionComponent.vue'
//division area end

//division  area start
import CategoryList from './components/Admin/Category/CategoryComponent.vue'
import CreateCategoryList from './components/Admin/Category/CreateCategoryComponent.vue'
import EditCategoryList from './components/Admin/Category/EditCategoryComponent.vue'
//division area end

//Model  area start
import BikeModelList from './components/Admin/Bikemodel/BikeModelComponent.vue'
import CreateBikeModelList from './components/Admin/Bikemodel/CreateBikeModelComponent.vue'
import EditBikeModelList from './components/Admin/Bikemodel/EditBikeModelComponent.vue'
//Model area end

//ModelYear  area start
import ModelYearList from './components/Admin/Modelyear/ModelyearComponent.vue'
import CreateModelYearList from './components/Admin/Modelyear/CreateModelyearComponent.vue'
import EditModelYearList from './components/Admin/Modelyear/EditModelyearComponent.vue'
//ModelYear area end

//subdivision  area start
import SubDivisionList from './components/Admin/Subdivision/SubdivisionComponent.vue'
import CreateSubDivisionList from './components/Admin/Subdivision/CreateSubdivisionComponent.vue'
import EditSubDivisionList from './components/Admin/Subdivision/EditSubdivisionComponent.vue'
//subdivision area end

//Bikeversion area start
import BikevesionList from './components/Admin/Bikeversion/BikeversionlistComponent.vue'
import CreateBikeversionList from './components/Admin/Bikeversion/CreateBikeversionComponent.vue'
import EditBikeversionList from './components/Admin/Bikeversion/EditBikeversionComponent.vue'
//Bikeversion area end

//Accessoriestype  area start
import AccessoritypeList from './components/Admin/Accessoriestype/AccessoriComponent.vue'
import CreateAccessoritypeList from './components/Admin/Accessoriestype/CreateAccessoriComponent.vue'
import EditAccessoritypeList from './components/Admin/Accessoriestype/EditAccessoriComponent.vue'
//Accessoriestype area end
//Accessories area start
import AccessoriesList from './components/Admin/Accessories/Accessorieslist.vue'
import AccessoriesdetailsList from './components/Admin/Accessories/Accessoriesdetails.vue'
//Accessories area end

//Bikebrand area start
import BikebrandList from './components/Admin/Bikebrand/BikebrandlistComponent.vue'
import CreateBikebrandList from './components/Admin/Bikebrand/CreateBikebrandComponent.vue'
import EditBikebrandList from './components/Admin/Bikebrand/EditBikebrandComponent.vue'
//Bikebrand area end

//Useraccount area start
import UserAccountList from './components/Admin/UserAccount/UserAccountList.vue'
//Useraccount area end
//Admin user manager
import Useradminmanager from './components/Admin/Users/Manageradminview.vue'
//Admin user manager

//bike post activeinactive
import bikepostactiveinacive from './components/Admin/Bike/UserBikepostlist'
import bikepostdetails from './components/Admin/Bike/UserBikeposdetails'
//bike post activeinactive

//Blog area start
import BlogPost from './components/Admin/Blog/BlogComponent.vue'
import CreateBlogPost from './components/Admin/Blog/CreateBlogComponent.vue'
import EditBlogPost from './components/Admin/Blog/EditBlogComponent.vue'
//Blog area end

//Blog page start
import BlogPage from './components/Admin/Blogpage/BlogpageComponent.vue'
import CreateBlogPage from './components/Admin/Blogpage/CreateBlogpageComponent.vue'
import EditBlogPage from './components/Admin/Blogpage/EditBlogpageComponent.vue'
//Blog page end
//Patentpage area start
import Parentpagelist from './components/Admin/Parentpage/Parentpagelist.vue'
import Createparentpage from './components/Admin/Parentpage/Createparentpage.vue'
import EditParentpageList from './components/Admin/Parentpage/EditParentpage.vue'
//Patentpage area end

//create user start
import Useraccounttype from './components/Admin/UserCreate/Useraccounttype.vue'
import Createuseraccount from './components/Admin/UserCreate/CreateUseraccount.vue'
import EditCreateuser from './components/Admin/UserCreate/Editcreateuser.vue'
import EditCreateadmin from './components/Admin/UserCreate/Editcreateadmin.vue'
import Admincreateuserlist from './components/Admin/UserCreate/Admincreateuserlist.vue'
//create user start

//Admin area end




//User area start
//en area start
import BikePost from './components/Home/En/BikePost.vue'
import NewBikePostDetails from './components/Home/En/NewBikePostDetails.vue'
import UsedBikePostDetails from './components/Home/En/UsedBikePostDetails.vue'
import Index from './components/Home/En/Index.vue'
import Blogpostdetails from './components/Home/En/Blogpostdetails.vue'
import Pagedetails from './components/Home/En/Blogpagedetails.vue'
import UserRegister from './components/Home/En/Userregister.vue'
import UserLogin from './components/Home/En/Userlogin.vue'
import UserDashboard from './components/Home/En/Userdashboard.vue'
//en area end


//Bn area start
// import BikePost from './components/Home/Bn/BikePost.vue'
// import NewBikePostDetails from './components/Home/Bn/NewBikePostDetails.vue'
// import UsedBikePostDetails from './components/Home/Bn/UsedBikePostDetails.vue'
import BNIndex from './components/Home/Bn/Index.vue'
import BNBlogpostdetails from './components/Home/Bn/Blogpostdetails.vue'
// import Pagedetails from './components/Home/Bn/Blogpagedetails.vue'
// import UserRegister from './components/Home/Bn/Userregister.vue'
// import UserLogin from './components/Home/Bn/Userlogin.vue'
// import UserDashboard from './components/Home/Bn/Userdashboard.vue'
//Bn area end



//Profile  area start
import Myprofile from './components/Home/En/Profile/Myprofile.vue'
import Shop from './components/Home/En/ShopView.vue'
import EditMyprofile from './components/Home/En/Profile/Editmyprofile.vue'
import EditMyEmail from './components/Home/En/Profile/ChangeEmail.vue'
import EditMyPassword from './components/Home/En/Profile/ChangePassword.vue'
import PaidMyprofileView from './components/Home/En/Profile/PaidView.vue'
import Shopapplyview from './components/Home/En/Profile/Shopapply.vue'
//Profile area end

//add post bike start
import BikepostList from './components/Home/En/Bike/Bikepostlist.vue'
import EditNewBike from './components/Home/En/Bike/EditBikeComponent.vue'
import Bikepoststartview from './components/Home/En/Bike/Bikepoststartview.vue'
import CreateNewBike from './components/Home/En/Bike/Bike.vue'
import UsedBike from './components/Home/En/Bike/UsedBike.vue'
import EditUsedBike from './components/Home/En/Bike/EditUsedBike.vue'
import Newbikedetails from './components/Home/En/Bike/Newbikedetails.vue'
import Usedbikedetails from './components/Home/En/Bike/Usedbikedetails.vue'
//add post bike end



//Bodytype area start
import BodytypeList from './components/Admin/Bodytype/BodytypelistComponent.vue'
import CreateBodytypeList from './components/Admin/Bodytype/CreateBodytypeComponent.vue'
import EditBodytypeList from './components/Admin/Bodytype/EditBodytypeComponent.vue'
//Bodytype area end

//import AddAccount from './components/SuperAdmin/AdminAccount/CreateAccount.vue'
//import EditAccount from './components/SuperAdmin/AdminAccount/EditAccount.vue'

//User area end
export const routes = [
    { path: '/superadmin/login', component: SuperAdminLogin }, //superadmin area start
    {
        path: '/superadmin',
        name: 'SuperAdminDashboard',
        component: SuperAdminDashboard,


        children: [
            //Accounttype area start
            { path: 'accounttypelist', name: 'Accountlistall', component: Accounttype },
            { path: 'createaccounttype', component: AddAccounttype },
            { path: 'editaccountype/:id', component: EditAccounttype },

            //Accounttype area end 
            //AccountRole area start
            { path: 'permissionlist', component: AccountPermission },
            { path: 'createpermission', component: AddAccountPermission },
            { path: 'editpermission/:id', component: EditAccountPermission },

            //AccountRole area end
            //AccountRole area start
            { path: 'accountrolelist', component: AccountRole },
            { path: 'createaccountrole', component: AddAccountRole },
            { path: 'editaccountrole/:id', component: EditAccountRole },

            //AccountRole area end


            //gender area start
            { path: 'genderlist', component: Gender },
            { path: 'creategender', component: AddGender },
            { path: 'editgender/:id', component: EditGender },
            //gender area end

            //Status area start
            { path: 'statuslist', component: Status },
            { path: 'createstatus', component: AddStatus },
            { path: 'editstatus/:id', component: EditStatus },
            //Status area end
            //Account area start
            { path: 'teammemberlist', component: AccountList },
            { path: 'createteammember', component: AddAccount },
            { path: 'editteammember/:id', component: EditAccount },
            //Account  area end
        ],
    }, //superadmin area end

    { path: '/admin/login', component: AdminLogin }, //admin area start
    {
        path: '/admin',
        name: 'AdminDashboard',
        component: AdminDashboard,
        children: [
            //profile area start
            { path: 'adminprofile', component: Adminprofile },
            { path: 'editadminprofile/:id', component: EditAdminprofile },
            { path: 'shoppaymentcheck', component: Shoppayment },
            //profile  area end

            //division  area start
            { path: 'divisionlist', component: DivisionList },
            { path: 'createdivision', component: CreateDivisionList },
            { path: 'editdivision/:id', component: EditDivisionList },
            //division  area end

            //subdivision  area start
            { path: 'subdivisionlist', component: SubDivisionList },
            { path: 'createsubdivision', component: CreateSubDivisionList },
            { path: 'editsubdivision/:id', component: EditSubDivisionList },
            //subdivision  area end

            //Category  area start
            { path: 'categorylist', component: CategoryList },
            { path: 'createcategory', component: CreateCategoryList },
            { path: 'editcategory/:id', component: EditCategoryList },
            //category  area end

            //BikeModel  area start
            { path: 'bikemodellist', component: BikeModelList },
            { path: 'createbikemodel', component: CreateBikeModelList },
            { path: 'editbikemodel/:id', component: EditBikeModelList },
            //BikeModel  area end

            //BikeModelyear  area start
            { path: 'modelyearlist', component: ModelYearList },
            { path: 'createmodelyear', component: CreateModelYearList },
            { path: 'editmodelyear/:id', component: EditModelYearList },
            //BikeModel year area end
            //version
            { path: 'bikeversionlist', component: BikevesionList },
            { path: 'createbikeversion', component: CreateBikeversionList },
            { path: 'editbikeversion/:id', component: EditBikeversionList },
            //version 

            //Brand start
            { path: 'bikebrandlist', component: BikebrandList },
            { path: 'createbikebrand', component: CreateBikebrandList },
            { path: 'editbikebrand/:id', component: EditBikebrandList },
            //Brand end
            //Bodytype start
            { path: 'bodytypelist', component: BodytypeList },
            { path: 'createbodytype', component: CreateBodytypeList },
            { path: 'editbodytype/:id', component: EditBodytypeList },
            //Bodytype end

            //Useraccount start
            { path: 'alluseraccountlist', component: UserAccountList },
            //Useraccount end
            //admin user manager
            { path: 'adminmanager', component: Useradminmanager },
            //admin user manager
            //userbikepost active inactive
            { path: 'userbikepostlist', component: bikepostactiveinacive },
            { path: 'bikepostdetails/:id', component: bikepostdetails },
            //userbikepost active inactive


            //Blog start
            { path: 'blogpost', component: BlogPost },
            { path: 'createblogpost', component: CreateBlogPost },
            { path: 'editblogpost/:id', component: EditBlogPost },
            //Blog end
            //Blog Page start
            { path: 'blogpage', component: BlogPage },
            { path: 'createblogpage', component: CreateBlogPage },
            { path: 'editblogpage/:id', component: EditBlogPage },
            //Blog Page end

            //Patent page  area start
            { path: 'parentpagelist', component: Parentpagelist },
            { path: 'createparentpage', component: Createparentpage },
            { path: 'editparentpage/:id', component: EditParentpageList },
            //Patent page  area end
            //createuser area start
            { path: 'userlist', component: Useraccounttype },
            { path: 'createuseraccount', component: Createuseraccount },
            { path: 'editcreateuser/:id', component: EditCreateuser },
            { path: 'editcreateadmin/:id', component: EditCreateadmin },
            { path: 'adminlist', component: Admincreateuserlist },
            //createuser area end

        ],

    },


    //admin area end
    //user area start
    { path: '/', name: 'Index', component: Index },

    { path: '/en/login', name: 'UserLogin', component: UserLogin },
    { path: '/register', component: UserRegister },
    {
        path: '/en',
        name: 'UserDashboard',
        component: UserDashboard,
        children: [
            { path: 'blog/:id', component: Blogpostdetails },
            { path: 'page/:id', component: Pagedetails },
            { path: 'myprofile', component: Myprofile },
            { path: 'shop/:id', component: Shop },
            { path: 'editmyprofile/:id', component: EditMyprofile },
            { path: 'changemyemail/:id', component: EditMyEmail },
            { path: 'changemypassword/:id', component: EditMyPassword },
            { path: 'paidmyaccount', component: PaidMyprofileView },
            { path: 'applyform', component: Shopapplyview },

            //profile area end
            //bikepost area start
            { path: 'bikepost', name: 'BikePost', component: BikePost },
            { path: 'postnewbikedetails/:id', component: NewBikePostDetails },
            { path: 'postusedbikedetails/:id', component: UsedBikePostDetails },
            { path: 'bikepostlist', name: 'BikePostList', component: BikepostList },
            { path: 'newdetails/:id', name: 'BikePostList1', component: Newbikedetails }, //for bike details
            { path: 'usedbikedetails/:id', name: 'UsedBikePostList', component: Usedbikedetails }, //for bike details
            { path: 'editbike/:id', component: EditNewBike },
            { path: 'biketypepost', component: Bikepoststartview },
            { path: 'newbikepost', component: CreateNewBike },
            { path: 'usedbike', component: UsedBike },
            { path: 'editusedbike/:id', component: EditUsedBike },
            //Bikepost  area end
            //blog page  area start

            //blog page  area end

        ],


    },
    { path: '/bn/blog/:id', component: BNBlogpostdetails },
    {

        path: '/bn',
        name: 'BNDashboard',
        component: BNIndex,
        children: [
            { path: '/:id', component: BNBlogpostdetails },
            // { path: 'page/:id', component: Pagedetails },
            // { path: 'myprofile', component: Myprofile },
            // { path: 'shop/:id', component: Shop },
            // { path: 'editmyprofile/:id', component: EditMyprofile },
            // { path: 'changemyemail/:id', component: EditMyEmail },
            // { path: 'changemypassword/:id', component: EditMyPassword },
            // { path: 'paidmyaccount', component: PaidMyprofileView },
            // { path: 'applyform', component: Shopapplyview },


        ],


    },

]