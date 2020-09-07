<template>
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Library</div>

					<div class="card-body">


						<h4 class="card-title ">Welcome to Libarary</h4>


						<div>
							<button @click="goToEvents()" class="btn btn-primary ml-5">Rent a Book</button>
							<button @click="goToEvents1()" class="btn btn-primary ml-5">Return Book</button>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</template>


<script>
	export default{

		methods: {
            goToEvents: function () {
                location.href = 'http://localhost/laravel/vuejs/public/user-book-show'
            },

            goToEvents1: function () {
                location.href = 'http://localhost/laravel/vuejs/public/user-return-book'
            }
        },

	}
	
</script>


<style>

	.card{
		margin-top: 15px;
		margin-bottom: 20px;
		background-color: burlywood;
	}

	
	.card-body{
		
	}

	.card-title{
			
	}

	.justify-content-center {
    
     }


	
</style>