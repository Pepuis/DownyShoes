jQuery(document).ready(function ($) {
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MqL = 1170;
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function () {
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	//mobile - open lateral menu clicking on the menu icon
	$('.cd-nav-trigger').on('click', function (event) {
		event.preventDefault();
		if ($('.cd-main-content').hasClass('nav-is-visible')) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		} else {
			$(this).addClass('nav-is-visible');
			$('.cd-main-header').addClass('nav-is-visible');
			$('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
				$('body').addClass('overflow-hidden');
			});
			toggleSearch('close');
			$('.cd-overlay').addClass('is-visible');
		}
	});

	//open search form
	$('.cd-search-trigger').on('click', function (event) {
		event.preventDefault();
		toggleSearch();
		closeNav();
	});


	


	//submenu items - go back link
	$('.go-back').on('click', function () {
		$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
	});

	function closeNav() {
		$('.cd-nav-trigger').removeClass('nav-is-visible');
		$('.cd-main-header').removeClass('nav-is-visible');
		$('.cd-primary-nav').removeClass('nav-is-visible');
		$('.has-children ul').addClass('is-hidden');
		$('.has-children a').removeClass('selected');
		$('.moves-out').removeClass('moves-out');
		$('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
			$('body').removeClass('overflow-hidden');
		});
	}

	function toggleSearch(type) {
		if (type == "close") {
			//close serach 
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
		} else {
			//toggle search visibility
			$('.cd-search').toggleClass('is-visible');
			$('.cd-search-trigger').toggleClass('search-is-visible');
			$('.cd-overlay').toggleClass('search-is-visible');
			if ($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
			($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible');
		}
	}

	function checkWindowWidth() {
		//check window width (scrollbar included)
		var e = window,
			a = 'inner';
		if (!('innerWidth' in window)) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		if (e[a + 'Width'] >= MqL) {
			return true;
		} else {
			return false;
		}
	}

	function moveNavigation() {
		var navigation = $('.cd-nav');
		var desktop = checkWindowWidth();
		if (desktop) {
			navigation.detach();
			navigation.insertBefore('.cd-header-buttons');
		} else {
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}
});

// Search AutoComplete
let names = [
	"Bella Toes",
	"Chikku Loafers",
	"(SRV) Sneakers",
	"Sheberry Heels",
	"Red Bellies",
	"Catwalk Flats",
	"Running Shoes",
	"Sunkun Casuals",
	"Bank Sneakers",
	"AIR FORCE 1",
	"JORDAN 1 MID TUFT ORANGE",
	"AIR MAX EXCEE",
	"AIR MORE UPTEMPO WHEAT",
	"AIR FORCE 1 SHADOW MULTICOLOR",
	"BLAZER LOW JUMBO ORANGE",
	"JORDAN SERIES SE",
	"BLAZER LOW JUMBO ORANGE"
];
//Sort names in ascending order
let sortedNames = names.sort();
//reference
let input = document.getElementById("input");
//Execute function on keyup
input.addEventListener("keyup", (e) => {
	//loop through above array
	//Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
	removeElements();
	for (let i of sortedNames) {
		//convert input to lowercase and compare with each string
		if (
			i.toLowerCase().startsWith(input.value.toLowerCase()) &&
			input.value != ""
		) {
			//create li element
			let listItem = document.createElement("li");
			//One common class name
			listItem.classList.add("list-items");
			listItem.style.cursor = "pointer";
			listItem.setAttribute("onclick", "displayNames('" + i + "')");
			//Display matched part in bold
			let word = "<b>" + i.substr(0, input.value.length) + "</b>";
			word += i.substr(input.value.length);
			//display the value in array
			listItem.innerHTML = word;
			document.querySelector(".list").appendChild(listItem);
		}
	}
});
function displayNames(value) {
	input.value = value;
	removeElements();
}
function removeElements() {
	//clear all the item
	let items = document.querySelectorAll(".list-items");
	items.forEach((item) => {
		item.remove();
	});
}