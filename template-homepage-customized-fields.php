<?php
/*
 * Template Name: Homepage Template Customized
*/

get_header();
?>
	<div id="primary" class="content-area">
		<main class="site-main" role="main">

		<?php $value = rwmb_meta( 'first_hero_background_color' );?>

			<!-- First Hero Section -->
			<div class="w-full pt-8 px-4
				md:px-12
				lg:px-16" 
				 style="background-color:<?php echo rwmb_meta( 'first_hero_background_color' );?>"
				>
				<div class="flex">
					<div class="-rotate-90 w-0 xs2 translate-x-2.5 translate-y-2 text-slate-700
						md:text-sm md:translate-x-4 md:translate-y-2.5
						lg:text-lg lg:translate-x-7 lg:translate-y-3.5
						">
						THE
					</div>
					<h1 class="montecatini text-4xl text-slate-700
						md:text-6xl 
						lg:text-8xl
						">
						DOYENNE
					</h1>
				</div>
				<div class="custom__color affable text-xl translate-x-2 -translate-y-4
					md:text-4xl md:translate-x-2 md:-translate-y-5
					lg:text-6xl lg:translate-x-4 lg:-translate-y-8
					">
					Agency
				</div>
				<div class="xs3 translate-x-11 -translate-y-10 inline-block
					md:scale-125 md:translate-x-20 md:-translate-y-10
					lg:scale-75 lg:text-xs lg:translate-x-32 lg:-translate-y-12
					">
					GLOBAL SALES
				</div>
				<div class="xs3 translate-x-14 -translate-y-10 inline-block
					md:scale-125 md:translate-x-32 md:-translate-y-10
					lg:scale-75 lg:text-xs lg:translate-x-36 lg:-translate-y-12
					">
					AND SALES TRAINING
				</div>
				<div class="w-5/6 lg:w-9/12 m-auto">

					<h2 class="arno text-slate-700 border-b text-4xl pt-2
						sm:text-5xl sm:pt-6
						md:text-6xl md:pt-12
						2xl:text-8xl"
						style="border-color:<?php echo rwmb_meta( 'first_hero_color' );?>
						">
						<?php rwmb_the_value( 'first_hero_title' ); ?>
					</h2>

					<h4 class="custom__color tracking-widest text-lg py-6
						sm:text-xl sm:py-8
						md:text-2xl md:py-10"
						style="color:<?php echo rwmb_meta( 'first_hero_color' );?>
						">
						<?php rwmb_the_value( 'first_hero_desc' ); ?>
					</h4>
					
					<div class="my-6 lg:my-12">
						<?php if(rwmb_meta('first_section_button_text') != null) { ?>
							<a 	href="
									<?php rwmb_the_value( 'first_hero_button_link' );?>" 
								class="arno text-white rounded-md text-xl px-4 pt-3 pb-1.5
								sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
								md:text-3xl md:px-6 md:pt-4 md:pb-2
								lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
								xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
								2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
								style="background-color:<?php echo rwmb_meta( 'first_hero_button_color' );?>
								">
									<?php rwmb_the_value( 'first_hero_button_text' ); ?>
							</a>
						<?php } ?>
					</div>
					<!-- Second Hero Section -->
					<div class="flex translate-y-2/4 space-x-4 mt-1
						md:-mt-8 md:gap-x-4
						lg:-mt-4
						xl:gap-x-8
						2xl:gap-x-12 2xl:mx-0
						">
						<div class="rounded-lg w-2/6"
							 style="background-color:<?php echo rwmb_meta( 'second_hero_color' );?>
							">
							<div class="text-white text-center text-base">
								<h1 class="text-sm pt-4 px-4 font-bold
									sm:text-base sm:pt-6 sm:px-7
									md:text-lg md:pt-8 md:px-9
									lg:text-xl lg:pt-12 lg:px-12
									xl:text-2xl xl:pt-12 xl:px-14 
									2xl:text-4xl 2xl:pt-20 2xl:pb-3 2xl:px-10
									">
									<?php rwmb_the_value( 'second_hero_first_title' ); ?>
								</h1>

								<h4 class="font-light text-xs pb-6 pt-1 px-1
									sm:px-6
									md:text-sm md:font-normal md:pt-3 md:pb-8 md:px-5
									lg:text-base lg:font-normal lg:pt-4 lg:pb-12 lg:px-4
									xl:text-lg xl:pb-12 xl:px-8
									2xl:text-xl
									">
									<?php rwmb_the_value( 'second_hero_first_desc' ); ?>
								</h4>
							</div>
						</div>

						<div class="rounded-lg w-2/6"
							 style="background-color:<?php echo rwmb_meta( 'second_hero_color' );?>
							">
							<div class="text-white text-center text-base">
								<h1 class="text-sm pt-4 px-4 font-bold 
								sm:text-base sm:pt-6 sm:px-7
								md:text-lg md:pt-8 md:px-9
								lg:text-xl lg:pt-12 lg:px-14
								xl:text-2xl xl:pt-12 xl:px-14 
								2xl:text-4xl 2xl:pt-20 2xl:pb-3
									">
									<?php rwmb_the_value( 'second_hero_second_title' ); ?>
								</h1>
								<h4 class="font-light text-xs pb-6 pt-1 px-1
									sm:px-6
									md:text-sm md:font-normal md:pt-3 md:pb-8 md:px-5
									lg:text-base lg:font-normal lg:pt-4 lg:pb-12 lg:px-4
									xl:text-lg xl:pb-12 xl:px-8
									2xl:text-xl
									">
									<?php rwmb_the_value( 'second_hero_second_desc' ); ?>
								</h4>
							</div>
						</div>

						<div class="rounded-lg w-2/6"
							 style="background-color:<?php echo rwmb_meta( 'second_hero_color' );?>
							">
							<div class="text-white text-center text-base">
								<h1 class="text-sm pt-4 px-3 font-bold
									sm:text-base sm:pt-6 sm:px-7
									md:text-lg md:pt-8 md:px-7
									lg:text-xl lg:pt-12 lg:px-10
									xl:text-2xl xl:pt-12 xl:px-12
									2xl:text-4xl 2xl:pt-20 2xl:pb-3
									">
									<?php rwmb_the_value( 'second_hero_third_title' ); ?>
								</h1>

								<h4 class="font-light text-xs pb-6 pt-1 px-1
									sm:px-6
									md:text-sm md:font-normal md:pt-3 md:pb-8 md:px-5
									lg:text-base lg:font-normal lg:pt-4 lg:pb-12 lg:px-4
									xl:text-lg xl:pb-12 xl:px-8
									2xl:text-xl
									">
									<?php rwmb_the_value( 'second_hero_third_desc' ); ?>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="pt-36 pl-14
				sm:pl-18 sm:ml-4
				md:pl-24 md:pt-56 md:ml-2
				lg:pl-44 lg:ml-2
				xl:pl-60
				2xl:pl-60 2xl:ml-8 2xl:pt-72 2xl:mt-4"> -->

			<div class="pt-36
			md:pt-56
			2xl:pt-72">
				<?php the_content(); ?>
			</div>
			

			<section class="flex w-full pt-36 pl-14
				sm:pl-18
				md:pl-24 md:pt-56
				lg:pl-44
				xl:pl-60 xl:pt-64
				2xl:pl-60 2xl:pt-72 2xl:mt-4
				">
				<div class="w-2/5 py-2 md:pr-10
					sm:pl-4
					md:py-4 md:pl-2
					lg:py-6 lg:pl-2
					xl:py-8
					2xl:py-14 2xl:pl-8
					">
					<h2 class="tracking-widest text-xl
						md:text-2xl
						xl:text-3xl
						">
						<?php rwmb_the_value( 'first_section_title' ); ?>
					</h2>
					<h1 class="custom__color text-2xl pb-3
						md:text-3xl md:pb-4
						xl:text-4xl
						2xl:text-5xl"
						style="color:<?php echo rwmb_meta( 'first_section_color' );?>
						">
						<?php rwmb_the_value( 'first_section_subtitle' ); ?>
					</h1>
					<h4 class="text-xs pr-2
						sm:text-xs
						md:text-sm
						lg:pr-12 lg:text-base
						xl:pr-12 xl:text-lg
						2xl:pr-16 2xl:text-xl
						">
						<?php rwmb_the_value( 'first_section_desc' ); ?></h4>
				</div>

				<div class="w-3/5 bg-gray-100 border border-gray-300
					sm:ml-0
					lg:py-28
					">
				</div>
			</section>

			<div class="my-12 md:mt-20 md:mb-16 2xl:mt-32 2xl:mb-28 flex justify-center">
				<?php if(rwmb_meta('first_section_button_text') != null) { ?>
					<a 	href="
							<?php rwmb_the_value( 'first_section_button_link' ); ?>" 
						class="arno custom__color2 text-white rounded-md text-xl px-4 pt-3 pb-1.5
							sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
							md:text-3xl md:px-6 md:pt-4 md:pb-2
							lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
							xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
							2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
						style="background-color:<?php echo rwmb_meta( 'first_section_button_color' );?>
						">
							<?php rwmb_the_value( 'first_section_button_text' ); ?>
					</a>
				<?php } ?>
			</div>

			<!-- Second Section -->
			<section class="flex">
				<div class="w-3/6 pl-14 pt-6
					sm:pl-16
					md:pl-24 md:pt-8
					lg:pl-44 lg:pt-10 lg:w-4/6
					xl:pt-14
					2xl:pt-32 2xl:w-full"
					 style="background-color:<?php echo rwmb_meta( 'second_section_color');?>
					">
					<h1 class="tracking-widest text-white text-lg
						sm:text-xl
						md:text-2xl
						xl:text-3xl xl:pb-1 xl:pt-12
						2xl:pb-2
						">
						<?php rwmb_the_value( 'second_section_title' ); ?>
					</h1>
					<h2 class="arno text-2xl text-slate-700
						md:text-3xl
						xl:text-4xl
						2xl:text-5xl 2xl:pb-6
						">
						<?php rwmb_the_value( 'second_section_subtitle' ); ?>
					</h2>
					<h4 class="text-xs text-white pt-1 pr-4
						sm:text-sm sm:pr-10
						md:text-base md:pt-3
						lg:text-lg lg:pb-4 lg:pt-4 lg:pr-20
						xl:text-xl xl:pb-8 xl:pt-6 xl:pr-24
						2xl:pr-16
						">
						<?php rwmb_the_value( 'second_section_desc' ); ?>
					</h4>
				</div>
				<div class="flex w-3/6 lg:w-2/6  translate-y-16" style="background-size:100% 100%">
					<?php rwmb_the_value( 'second_section_image', array( 'size' => 'large' ) );?>
				</div>
			</section>
			<div class="mt-28 md:mt-32 xl:mt-40 flex justify-center">
				<?php if(rwmb_meta('second_section_button_text') != null) { ?>
					<a 	href="
							<?php rwmb_the_value( 'second_section_button_link' ); ?>" 
						class="arno custom__color2 text-white rounded-md text-xl px-4 pt-3 pb-1.5
							sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
							md:text-3xl md:px-6 md:pt-4 md:pb-2
							lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
							xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
							2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
						style="background-color:<?php echo rwmb_meta( 'second_section_button_color' );?>
						">
							<?php rwmb_the_value( 'second_section_button_text' ); ?>
					</a>
				<?php } ?>
			</div>

			<!-- Third Section -->
			<p class="arno w-full text-center text-base pt-10 mb-2 px-6
				sm:px-12 sm:text-base
				md:text-xl md:pt-12 md:px-20
				lg:text-2xl lg:px-28
				xl:text-2xl xl:px-36 xl:pt-36
				2xl:text-3xl 2xl:px-44 2xl:pt-36
        		">
				<?php rwmb_the_value( 'third_section_description' ); ?>
      		</p>

			<div class="grid grid-cols-3 mx-14 place-items-center pt-8 pb-2 gap-x-16 sm:gap-x-24 md:gap-x-0
				sm:pt-9 
				md:pt-10 
				lg:pt-16 
				2xl:pt-20 
				">
				<div class="w-full bg-no-repeat py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32" style="background-image: url(<?php echo get_theme_file_uri('/svg/svg1.svg'); ?>);background-size:100% 100%"></div>
				<div class="w-full bg-no-repeat py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32" style="background-image: url(<?php echo get_theme_file_uri('/svg/svg2.svg'); ?>);background-size:100% 100%"></div>
				<div class="w-full bg-no-repeat py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32" style="background-image: url(<?php echo get_theme_file_uri('/svg/svg3.svg'); ?>);background-size:100% 100%"></div>
			</div>
			<div class="grid grid-cols-3 mx-14 tracking-widest place-items-center text-xs gap-x-16
				 sm:gap-x-24 sm:text-sm
				 md:gap-x-0 md:text-base
				 lg:text-lg lg:pt-4
				 ">
				<h1>CLIENT</h1>
				<h1>CLIENT</h1>
				<h1>CLIENT</h1>
			</div>
			<div class="arno grid grid-cols-3 mx-14 place-items-center pb-8 text-lg custom__color gap-x-16 font-semibold
			 	sm:gap-x-24 sm:pb-9 sm:text-xl
				md:gap-x-0 md:pb-10 md:text-2xl
				lg:pb-16 lg:text-3xl
				2xl:pb-20 2xl:text-3xl
				">
				<h1>Attraction</h1>
				<h1>Acquisition</h1>
				<h1>Delivery</h1>
			</div>

			<!-- Fourth Section -->
			<section class="w-full"
					 style="background-color:<?php echo rwmb_meta( 'fourth_section_color' );?>
					 ">
				<p class="arno text-center text-base pt-6 px-24
					sm:pt-10 sm:text-lg sm:px-28
					md:text-xl md:pt-12
					lg:text-2xl lg:pt-16
					xl:text-3xl xl:mt-10 xl:pt-20
					2xl:text-3xl 2xl:mt-2 2xl:pt-24
					">
					<?php rwmb_the_value( 'fourth_section_title' ); ?>
				</p>
				<p class="text-sm text-center pt-2 px-4 pb-6
					sm:pt-4 sm:pb-10
					md:px-20 md:pt-6 md:pb-12
					lg:text-lg lg:px-28 lg:pb-16
					xl:px-36
					2xl:px-80
					">
					<?php rwmb_the_value( 'fourth_section_description' ); ?>
				</p>
      		</section>

			<div class="mt-20 flex justify-center">
				<?php if(rwmb_meta('fourth_section_button_text') != null) { ?>
					<a 	href="
							<?php rwmb_the_value( 'fourth_section_button_link' ); ?>" 
						class="arno custom__color2 text-white rounded-md text-xl px-4 pt-3 pb-1.5
							sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
							md:text-3xl md:px-6 md:pt-4 md:pb-2
							lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
							xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
							2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
						style="background-color:<?php echo rwmb_meta( 'fourth_section_button_color' );?>">
							<?php rwmb_the_value( 'fourth_section_button_text' ); ?>
					</a>
				<?php } ?>
			</div>

			<!-- Fifth Section -->
			<div class="flex justify-end mt-0">
				<div class="w-2/6 z-10 order-1 translate-x-20
					sm:translate-x-24
					md:translate-x-28
					lg:translate-x-48 lg:scale-90 lg:-translate-y-16
					xl:translate-x-3/4 xl:scale-75 xl:-translate-y-24">
					<?php rwmb_the_value( 'fifth_section_image', array( 'size' => 'large' ) );?>
				</div>

				<div class="w-4/6 z-0 order-2 translate-y-12
					lg:scale-y-90
					xl:scale-y-75"
					style="background-color:<?php echo rwmb_meta( 'fifth_section_color' );?>">
					<div class="ml-24 pt-4
					sm:ml-32 sm:pt-4
					md:ml-40 md:pt-8
					lg:ml-64 lg:pt-16
					xl:ml-80 xl:pl-14
					2xl:ml-96 2xl:pl-24 2xl:pt-24
					">
					<h1 class="text-lg custom__color
						sm:text-xl sm:pt-10
						md:text-2xl
						lg:text-3xl
						xl:text-4xl xl:pt-24
						2xl:text-5xl
						">
						<?php rwmb_the_value( 'fifth_section_title' ); ?>
					</h1>
					<h2 class="text-white text-base -translate-y-2
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value( 'fifth_section_first_subtitle' ); ?>
					</h2>
					<h2 class="text-white text-base -translate-y-4
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value( 'fifth_section_second_subtitle' ); ?>
					</h2>
					<h4 class="text-white text-sm pb-2 pr-2
						sm:text-base sm:pt-2 sm:pr-10
						md:text-lg md:pr-20
						lg:text-xl lg:pt-8 lg:pr-30
						xl:text-2xl xl:pt-24 xl:pr-40
						2xl:text-3xl 2xl:pr-24
						">
						<?php rwmb_the_value( 'fifth_section_desc' ); ?>
					</h4>
					</div>
				</div>
      		</div>

			  <!-- Sixth Section -->
			<section class="flex w-full z-10 pt-32
				sm:pt-20
				md:pt-24
				lg:pt-28
				">
				<div class="bg-cover w-6/6 bg-no-repeat z-20 order-2 -translate-x-3 translate-y-28 z-30
					sm:-translate-x-4 sm:translate-y-32
					md:-translate-x-5 md:translate-y-36
					lg:-translate-x-6 lg:translate-y-48
					xl:-translate-x-20 xl:translate-y-60
					2xl:scale-x-100 2xl:scale-y-100 2xl:-translate-x-24 2xl:translate-y-36
					">
					<?php rwmb_the_value( 'sixth_section_image', array( 'size' => 'large' ) );?>
				</div>

				<div class="flex">
					<div class="w-full z-20 order-1"
					style="background-color:<?php echo rwmb_meta( 'sixth_section_color' );?>">
					<div class="arno text-white text-3xl w-5/6 xl:w-3/4 border-b-2 border-white pt-6 ml-6
							sm:text-3xl sm:pt-8 sm:ml-10
							md:textg-4xl md:pt-10 md:ml-11
							lg:text-5xl lg:pt-14 lg:ml-16
							xl:text-6xl xl:pt-16 xl:ml-12
							2xl:text-8xl 2xl:ml-16
							">
							<?php rwmb_the_value('sixth_section_title'); ?>
					</div>
					<div class="text-white text-base ml-6 tracking-wide
							sm:text-lg sm:ml-10
							md:ml-11
							lg:text-xl lg:ml-16 lg:pb-4
							xl:pb-8 xl:ml-12
							2xl:text-2xl 2xl:ml-16
							">
							<?php rwmb_the_value('sixth_section_subtitle') ?>
					</div>
					<div class="flex flex-col ml-2 mt-6 mb-8 gap-4 text-white text-xs mr-8
						sm:mr-8 sm:text-sm sm:py-2
						md:mr-10 md:text-base md:py-3
						lg:mr-12 lg:text-lg lg:py-4
						xl:mr-40 xl:py-6 xl:mb-12
						2xl:mr-44 2xl:pb-8 2xl:gap-8
						">

					<?php  	$sixth_section_items = rwmb_meta('sixth_section_items');
							foreach( $sixth_section_items as $item) { 
					?>

					<div class="flex space-x-10">
						<div id="pointer" class="w-10 custom__color4 opacity-40 mt-4
							sm:mt-0"></div>
						<div class="w-full pl-2 pr-3 xl:pr-0 h-20 justify-center text-xs pb-28 pt-3
							sm:text-sm sm:pb-0
							md:text-base
							lg:py-4"
							 style="background-color: <?php echo rwmb_meta( 'sixth_section_color' );?>;filter:brightness(110%);
							 ">
							<?php echo $item; ?>
						</div>
					</div>

					<?php } ?>

				</div>
      		</section>

			<!-- Seventh Section -->
			<div class="lg:custom__color5 lg:py-2 m-0 lg:-translate-y-full
				2xl:custom__color5 2xl:py-56 2xl:lg:py-2 2xl:-translate-y-full">
			</div>

			<div class="lg:-translate-y-2/4
				lg:flex lg:flex-col lg:float-right lg:w-4/6"
				style="background-color: <?php echo rwmb_meta( 'seventh_section_color' );?>"
				>
				<div class="arno tracking-wide text-lg ml-16 pb-6 pt-36 -translate-y-14
				sm:text-xl sm:-translate-y-16
				md:text-2xl md:-translate-y-14
				lg:text-3xl lg:translate-y-8 lg:translate-x0 lg:pt-96 lg:mt-64
				xl:pt-72 xl:translate-y-10 xl:mt-80
				2xl:pt-80 2xl:mt-72 2xl:pb-10
				">
					<?php rwmb_the_value('seventh_section_title');?>
				</div>
				<div class="arno text-2xl ml-16">
					<?php rwmb_the_value('seventh_section_subtitle');?>
				</div>

				<div class="flex flex-col ml-2 mb-4 gap-3 text-xs -translate-y-12
					sm:text-sm sm:-translate-y-12
					md:text-base md:-translate-y-14
					lg:text-lg lg:translate-y-0 lg:translate-x-0 lg:pt-6
					xl:pt-8
					xl:text-xl
					2xl:text-xl
					">

					<?php 
						$seventh_section_items = rwmb_meta('seventh_section_items');
						foreach($seventh_section_items as $item) { 
					?>

					<div class="flex flex-row space-x-5 pl-12">
						<div class="p-9 bg-no-repeat" style="background-image:url(<?php echo get_theme_file_uri('/images/checked.png'); ?>)"></div>
						<div class="w-4/6">
							<?php echo $item; ?>
						</div>
					</div>

					<?php } ?>

				</div>
			</div>

			<!-- Eighth Section -->
			<div class="flex flex-row justify-center content-center w-full mt-2 mb-4 space-x-10
					lg:py-12 lg:my-0 lg:-translate-y-96"
					style="background-color: <?php echo rwmb_meta( 'eighth_section_color' );?>
					">
				<div class="ml-12 w-2/4 pt-16
					sm:ml-12 sm:pt-24 sm:ml-16
					md:ml-16 md:pt-32 md:ml-20
					lg:ml-20 lg:translate-y-28 lg:ml-24
					lg:py-2 
					xl:ml-28 xl:translate-y-24
					2xl:ml-36
					">
					<?php if(rwmb_meta('eighth_section_button_text') != null) { ?>
						<a 	href="
								<?php rwmb_the_value( 'eighth_section_button_link' ); ?>"
							class="arno custom__color2 text-white rounded-md px-4 text-xl pt-3 pb-1.5
								sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
								md:text-3xl md:px-6 md:pt-4 md:pb-2
								lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
								xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
								2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
							style="background-color: <?php echo rwmb_meta( 'eighth_section_button_color' );?>
							">
								<?php rwmb_the_value( 'eighth_section_button_text' ); ?>
						</a>
					<?php } ?>
				</div>

				<div class="italic text-white text-xs pt-2 pb-6 pr-4 w-2/4
					sm:text-sm sm:py-4 sm:pr-16 sm:text-sm sm:pb-8
					md:text-base md:py-12 md:text-base
					lg:text-lg 
					xl:text-xl xl:pr-56
					2xl:text-xl translate-y-2
					">
					<?php rwmb_the_value('eighth_section_desc'); ?>
				</div>
			</div>

			<!-- Ninth Section -->
			<div class="boder-b-2 border-gray-400 w-full pt-8 pb-20 lg:-translate-y-96"
				 style="background-color: <?php echo rwmb_meta( 'ninth_section_color' );?>
				 ">
				<div class="flex justify-center">
					<div class="arno text-white text-3xl border-b border-white w-10/12
						sm:text-3xl sm:pt-4
						md:text-4xl md:pt-6
						lg:text-5xl lg:pt-8
						xl:text-6xl lg:pt-10
						2xl:text-7xl 2xl:pt-12
						">
							<?php rwmb_the_value('ninth_section_outer_title') ?>
					</div>
				</div>
				<div class="my-5"
					 style="background-color: <?php echo rwmb_meta( 'ninth_section_color' );?>
					">

					<div class="flex justify-center">
						<div class="w-10/12 bg-white text-center">
							<div class="tracking-wide text-base pb-2 pt-12
								sm:text-lg sm:pt-14 sm:pb-4
								md:text-xl md:pt-16 md:pb-4
								lg:text-2xl lg:pt-120 lg:pb-4
								xl:text-3xl xl:pt-24 xl:pb-6
								2xl:pt-24 2xl:pb-8
								">
								<?php rwmb_the_value('ninth_section_inner_first_title') ?>
							</div>
							<div class="garamond text-2xl
								md:text-3xl
								xl:text-4xl
								">
								<?php rwmb_the_value('ninth_section_inner_first_subtitle') ?>
							</div>
							<div class="garamond text-2xl
								md:text-3xl
								xl:text-4xl
								">
								<?php rwmb_the_value('ninth_section_inner_second_subtitle') ?>
							</div>
							<div class="font-light text-base
								md:text-lg
								xl:text-xl
								">
								<?php rwmb_the_value('ninth_section_short_desc') ?>
							</div>
							<div class="pt-6 tracking-widest text-base
								sm:text-lg
								md:text-xl
								lg:text-2xl lg:pt-8
								xl:text-2xl xl:pt-10
								2xl:text-3xl 2xl:pt-14
								">
								<?php rwmb_the_value('ninth_section_inner_second_title') ?>
							</div>
							<div class="arno custom__color text-2xl pt-1
								sm:text-2xl sm:pb-2
								md:text-3xl md:pb-4
								lg:text-3xl lg:pb-4
								xl:text-4xl xl:pb-6
								2xl:text-4xl 2xl:pb-6"
								 style="color: <?php echo rwmb_meta( 'ninth_section_color' );?>
								">
								<?php rwmb_the_value('ninth_section_inner_price') ?>
							</div>
							<div class="font-light italic text-base
								md:text-lg
								xl:text-xl">
								<?php rwmb_the_value('ninth_section_information') ?>
							</div>
							<div class="flex justify-center">
								<div class="arno text-2xl w-11/12 pt-8
								md:text-3xl
								xl:text-4xl xl:w-10/12
								">
									<?php rwmb_the_value('ninth_section_main_desc') ?>
								</div>
							</div>

							<div class="flex justify-center pt-12 pb-16">
								<?php if(rwmb_meta('ninth_section_button_text') != null) { ?>
									<a 	href="
											<?php rwmb_the_value( 'ninth_section_button_link' ); ?>"
										class="arno text-white rounded-md text-xl px-4 pt-3 pb-1.5
											sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
											md:text-3xl md:px-6 md:pt-4 md:pb-2
											lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
											xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
											2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
										style="background-color: <?php echo rwmb_meta( 'ninth_section_button_color' );?>
										">
											<?php rwmb_the_value( 'ninth_section_button_text' ); ?>
									</a>
								<?php } ?>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Tenth Section -->
			<div class="garamond flex flex-col justify-center pt-6 sm:pt-8 md:pt-10 lg:py-0 lg:-translate-y-72">
			
				<?php  	$tenth_section_items = rwmb_meta('tenth_section_items');
						foreach( $tenth_section_items as $item) { 
				?>
						<div class="w-3/6 m-auto pt-1 pb-4 font-light text-base w-full
							sm:text-lg
							md:text-xl
							lg:text-xl
							xl:text-2xl
							">
							<?php echo $item; ?>
						</div>

				<?php } ?>

				<div class="flex justify-center pt-12 pb-16">
					<?php if(rwmb_meta('tenth_section_button_text') != null) { ?>
						<a 	href="
								<?php rwmb_the_value( 'tenth_section_button_link' ); ?>"
							class="arno custom__color2 text-white rounded-md text-xl px-4 pt-3 pb-1.5
								sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
								md:text-3xl md:px-6 md:pt-4 md:pb-2
								lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
								xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
								2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
							style="background-color: <?php echo rwmb_meta( 'tenth_section_button_color' );?>
							">
								<?php rwmb_the_value( 'tenth_section_button_text' ); ?>
						</a>
					<?php } ?>
				</div>

			</div>

			<div class="flex flex-col pb-5 lg:-translate-y-36 xl:-translate-y-48 gap-y-1">
				<div class="flex gap-1">
					<div class="w-9/12 py-24 sm:py-28 md:py-40 xl:py-56 2xl:py-64 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle1.png'); ?>);background-size:100% 100%"></div>
					<div class="w-3/12 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle2.png'); ?>);background-size:100% 100%"></div>
				</div>

				<div class="flex gap-1">
					<div class="w-3/6 py-24 sm:py-28 md:py-40 xl:py-56 2xl:py-64 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle3.png'); ?>);background-size:100% 100%"></div>
					<div class="w-3/6 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle4.png'); ?>);background-size:100% 100%"></div>
				</div>

				<div class="flex gap-1">
					<div class="w-5/12 py-16 sm:py-20 md:py-28 xl:py-40  2xl:py-56 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle5.png'); ?>);background-size:100% 100%"></div>
					<div class="w-3/12 bg-no-repeat bg-contain" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle6.png'); ?>);background-size:100% 100%"></div>
					<div class="w-5/12 bg-no-repeat bg-cover" style="background-image:url(<?php echo get_theme_file_uri('/images/bundle7.png'); ?>);background-size:100% 100%"></div>
				</div>
			</div>

			<!-- Eleventh Section -->
			<div class="flex justify-end mt-6 mt-12">
				<div class="w-2/6 z-10 order-1 translate-x-20
					sm:translate-x-24
					md:translate-x-28
					lg:translate-x-48 lg:scale-90 lg:-translate-y-16
					xl:translate-x-3/4 xl:scale-75 xl:-translate-y-24
					">
					<?php rwmb_the_value( 'eleventh_section_image', array( 'size' => 'large' ) );?>
				</div>

				<div class="w-4/6 z-0 order-2 translate-y-12
					lg:scale-y-90
					xl:scale-y-75
					2xl:scale-y-75"
					 style="background-color: <?php echo rwmb_meta( 'eleventh_section_color' );?>
					">
				<div class="ml-24 pt-4
					sm:ml-32 sm:pt-4
					md:ml-40 md:pt-8
					lg:ml-64 lg:pt-16
					xl:ml-80 xl:pl-14
					2xl:ml-96 2xl:pl-24 2xl:pt-24
					">
					<h1 class="text-lg text-slate-700
						sm:text-xl sm:pt-10
						md:text-2xl
						lg:text-3xl
						xl:text-4xl xl:pt-24
						2xl:text-5xl
						">
						<?php rwmb_the_value('eleventh_section_title'); ?>
					</h1>
					<h2 class="text-white tracking-wide text-base -translate-y-2
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value('eleventh_section_first_subtitle'); ?>
					</h2>
					<h2 class="text-white text-base -translate-y-4
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value('eleventh_section_second_subtitle'); ?>
					</h2>
					<h4 class="text-white text-sm pb-2
						sm:text-base sm:pt-2 sm:pr-10
						md:text-lg md:pr-20
						lg:text-xl lg:pt-8 lg:pr-30
						xl:text-2xl xl:pt-24 xl:pr-36
						2xl:text-3xl
						">
						<?php rwmb_the_value('eleventh_section_desc'); ?>
					</h4>
				</div>
				</div>
			</div>

			<!-- Twelfth Section -->
			<div class="flex justify-start mt-24 lg:mt-40 xl:-translate-y-2 xl:mt-6">
				<div class="w-2/6 z-10 order-2 -translate-x-20
					sm:-translate-x-24 sm:mt-6
					md:-translate-x-32 md:mt-6
					lg:-translate-x-48 lg:scale-90 lg:-translate-y-16
					xl:-translate-x-3/4 xl:scale-75 xl:-translate-y-24
					">
					<?php rwmb_the_value( 'twelfth_section_image', array( 'size' => 'large' ) );?>
				</div>

				<div class="w-4/6 z-0 order-1 translate-y-12
					sm:mt-6 sm:translate-y-12
					md:mt-6 md:translate-y-12
					lg:scale-y-90 lg:translate-y-12
					xl:scale-y-75"
					 style="background-color: <?php echo rwmb_meta( 'twelfth_section_color' );?>
					">
				<div class="pl-6 pt-4
					sm:pl-8 sm:pt-4
					md:pl-14 md:pt-8
					lg:pl-16 lg:pt-16
					xl:pl-36
					2xl:pl-28 2xl:pt-24
					">
					<h1 class="text-lg text-slate-700
						sm:text-xl sm:pt-10
						md:text-2xl
						lg:text-3xl
						xl:text-4xl xl:pt-24
						2xl:text-5xl
						">
						<?php rwmb_the_value('twelfth_section_title'); ?>
					</h1>
					<h2 class="text-white tracking-wide text-base -translate-y-2
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value('twelfth_section_first_subtitle'); ?>
					</h2>
					<h2 class="text-white tracking-wide text-base -translate-y-4
						sm:text-lg
						md:text-xl
						lg:text-2xl
						xl:text-2xl
						2xl:text-3xl 2xl:tracking-widest pt-2
						">
						<?php rwmb_the_value('twelfth_section_second_subtitle'); ?>
					</h2>
					<h4 class="text-white text-sm pb-2 pr-24
						sm:text-base sm:pt-2 sm:pr-32 sm:mr-2
						md:text-lg md:pr-44
						lg:text-xl lg:pt-8 lg:pr-64
						xl:text-2xl xl:pt-24 xl:pr-80 xl:mr-14
						2xl:text-3xl 2xl:pr-96
						">
						<?php rwmb_the_value('twelfth_section_desc'); ?>
					</h4>
				</div>
				</div>
			</div>

			<!-- Thirteenth Section -->
			<article class="custom__color5 w-full mt-24
				sm:mt-32
				md:mt-30
				lg:mt-40
				xl:mt-24
				">
				<h1 class="garamond text-lg text-center pt-10 pb-4 px-16
					sm:text-xl sm:pt-14 sm:pb-2 sm:px-28
					md:text-2xl md:pb-0
					lg:text-3xl lg:pt-20 lg:pb-2 lg:pt-24
					xl:text-4xl xl:pt-28
					">
					<?php rwmb_the_value('thirteenth_section_title') ?>
				</h1>
				<h4 class="text-sm text-center pb-10 px-4
					sm:text-base sm:px-5 sm:pt-4 sm:pb-14
					md:text-lg md:px-12 md:mx-1 md:pt-6
					lg:text-xl lg:px-14 lg:pb-24
					xl:text-xl xl:px-32 xl:mx-36 xl:pb-28
					2xl:text-2xl
					">
					<?php rwmb_the_value('thirteenth_section_desc') ?>
				</h4>
			</article>
		
			<div class="flex justify-center">
				<div class="text-base tracking-wide pt-5
				sm:text-lg sm:pt-7
				md:text-xl md:pt-8
				lg:text-2xl lg:pt-12
				xl:text-2xl xl:pt-14
				2xl:text-3xl 2xl:tracking-widest 2xl:pt-16">
				<?php rwmb_the_value('fourteenth_section_title') ?>
				</div>
			</div>
			<div class="flex justify-center ml-1">
				<div class="bg-cover bg-no-repeat py-6 w-24
					sm:py-8 sm:w-28
					md:py-8 md:w-32
					lg:py-10 lg:w-36
					xl:py-12 xl:w-40
					2xl:py-14 2xl:w-44">
					<?php rwmb_the_value( 'fourteenth_section_image', array( 'size' => 'large' ) );?>
				</div>
			</div>

			<div class="mt-2 mb-12 md:mb-20 md:mb-16 lg:mb-28 lg:mt-4 2xl:mt-6 2xl:mb-28 flex justify-center">
				<?php if(rwmb_meta('fourteenth_section_button_text') != null) { ?>
					<a 	href="
							<?php rwmb_the_value( 'fourteenth_section_button_link' ); ?>" 
						class="arno custom__color2 text-white rounded-md text-xl px-4 pt-3 pb-1.5
							sm:text-2xl sm:px-6 sm:pt-4 sm:pb-2
							md:text-3xl md:px-6 md:pt-4 md:pb-2
							lg:text-3xl lg:px-10 lg:pt-6 lg:pb-3
							xl:text-4xl xl:px-12 xl:pt-6 xl:pb-3
							2xl:text-5xl 2xl:px-20 2xl:pt-8 2xl:pb-4"
						style="background-color:<?php echo rwmb_meta( 'fourteenth_section_button_color' );?>
						">
							<?php rwmb_the_value( 'fourteenth_section_button_text' ); ?>
					</a>
				<?php } ?>
			</div>

			<div class="w-full 
				lg:mt-16
				xl:mt-20"
				style="background-color:<?php echo rwmb_meta( 'contact_form_color' );?>"
				>

				<div class="pt-2 w-5/6 m-auto">
					<div class="tracking-widest text-base pt-10
						sm:pt-14 sm:text-lg
						md:text-2xl
						lg:text-3xl lg:pt-20
						xl:text-3xl xl:pt-28
						">
						<?php rwmb_the_value( 'contact_form_title' ); ?>
					</div>

					<div class="arno custom__color text-2xl
						sm:text-2xl
						md:text-3xl
						lg:text-4xl
						xl:text-4xl
						">
						<?php rwmb_the_value( 'contact_form_subtitle' ); ?>
					</div>
					<div class="flex space-x-10">
						<h1 class="w-3/6 text-sm
							sm:text-base
							md:text-lg
							lg:text-xl
							xl:text-xl
							2xl:text-2xl
							">
							<?php rwmb_the_value( 'contact_form_desc' ); ?>
						</h1>

						<div class="w-3/6 ">
						<?php dynamic_sidebar('contact-form'); ?>
						</div>
					</div>

				</div>
			</div>

		<!-- THE CONTACT FORM -->
		

			<!-- CTA -->
			<section id="cta" class="wrapper style4">
				<div class="inner">
					<header>
						<h2><?php rwmb_the_value( 'cta_title' ); ?></h2>
						<?php rwmb_the_value( 'cta_desc' ); ?>
					</header>
					<ul class="actions vertical">
						<li><a href="<?php rwmb_the_value( 'cta_button_1_link' ); ?>" class="button fit special"><?php rwmb_the_value( 'cta_button_1_text' ); ?></a></li>
						<li><a href="<?php rwmb_the_value( 'cta_button_2_link' ); ?>" class="button fit special"><?php rwmb_the_value( 'cta_button_2_text' ); ?></a></li>
					</ul>
				</div>
			</section>

		</main>
	</div>

<?php get_footer(); ?>