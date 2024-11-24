// faq section JS
document.addEventListener( 'DOMContentLoaded', function() {
	const closeButtons = document.querySelectorAll( '.close-button' );
	if ( closeButtons.length ) {
		closeButtons.forEach( function( button ) {
			button.style.display = 'none';
		} );
		closeButtons.forEach( function( button ) {
			button.addEventListener( 'click', toggleAnswer );
		} );
	}

	// Handle click on the question itself (h3)
	const questionContainer = document.querySelectorAll( '.faq-section__inner_list-question' );
	if ( questionContainer.length ) {
		questionContainer.forEach( function( container ) {
			container.addEventListener( 'click', function( event ) {
				event.preventDefault();
				const clickButton = container.querySelector( '.click-button' );
				toggleAnswer( clickButton );
			} );
		} );
	}
	// Function to toggle answer display
	function toggleAnswer( clickButton ) {
		if ( ! clickButton || ! ( clickButton instanceof HTMLElement ) ) {
			return;
		}
		const answer = clickButton.closest( '.faq-section__inner_list-question' ).nextElementSibling;

		if ( answer.classList.contains( 'showanswer' ) ) {
			answer.classList.remove( 'showanswer' );
			answer.style.maxHeight    = '0';
			clickButton.style.display = 'inline';

			if ( clickButton.nextElementSibling ) {
				clickButton.nextElementSibling.style.display = 'none';
			}
		} else {
			// Optional: Close any open answer
			document.querySelectorAll( '.faq-section__inner_list-answer' ).forEach( function( ans ) {
				ans.classList.remove( 'showanswer' );
				ans.style.maxHeight = '0';
			} );
			document.querySelectorAll( '.close-button' ).forEach( function( btn ) {
				btn.style.display = 'none';
			} );
			document.querySelectorAll( '.click-button' ).forEach( function( btn ) {
				btn.style.display = 'inline';
			} );
			answer.style.display      = 'block';
			clickButton.style.display = 'none';
			// Open the clicked answer
			answer.classList.add( 'showanswer' );
			answer.style.maxHeight    = answer.scrollHeight + 'px';
			clickButton.style.display = 'none';

			if ( clickButton.nextElementSibling ) {
				clickButton.nextElementSibling.style.display = 'inline';
			}
		}
	}

	//This code is used to color the specific text on the excerpt in the testimonials post on the homepage.
	const paragraphs = document.querySelectorAll( '.testimonial-excerpt' );

	const targetText = '@Active Website Management';

	if ( paragraphs ) {
		paragraphs.forEach( ( paragraph ) => {
			paragraph.innerHTML = paragraph.innerHTML.replace(
				targetText,
				`<span style="color: #2B51FF">${ targetText }</span>`,
			);
		} );
	}
} );

// header sidebar toggle code.
document.addEventListener( 'DOMContentLoaded', function() {
	// Get the elements
	const headerToggle        = document.querySelector( '.header__inner_togle' );
	const sidebar             = document.querySelector( '.sidebar' );
	const closeSidebar        = document.querySelector( '.close-sidebar' );
	const sidebarToggleButton = document.querySelector( '.sidebar__togle' );

	if ( headerToggle ) {
		// Open sidebar when clicking the header toggle button
		headerToggle.addEventListener( 'click', function() {
			sidebar.classList.add( 'show' );
			closeSidebar.classList.add( 'show' );
		} );
	}

	if ( sidebarToggleButton ) {
		// Close sidebar when clicking the close button inside the sidebar
		sidebarToggleButton.addEventListener( 'click', function() {
			sidebar.classList.remove( 'show' );
			closeSidebar.classList.remove( 'show' );
		} );
	}

	if ( closeSidebar ) {
		// Close sidebar when clicking outside the sidebar (overlay)
		closeSidebar.addEventListener( 'click', function() {
			sidebar.classList.remove( 'show' );
			closeSidebar.classList.remove( 'show' );
		} );
	}
} );

const fetchPlanPrice = ( planName ) => {
	return new Promise( ( resolve, reject ) => {
		const data = {
			action: 'get_plan_price',
			plan_name: planName,
			nonce: awmOptions.get_plan_price_nonce,
		};

		jQuery.post( awmOptions.ajax_url, data, ( response ) => {
			if ( response.success ) {
				resolve( response.data );
			} else {
				reject( 'Failed to fetch price: ' + response.data );
			}
		} );
	} );
};

/**
 * Front Page Template
 * Contact Form Section
 * When the form is successfully submitted, show the modal
 */
document.addEventListener( 'DOMContentLoaded', function() {
	const submit = document.querySelector( '#awm-submit-form-container input.wpcf7-submit' );
	document.addEventListener( 'wpcf7mailsent', function( e ) {
		let planName;
		e.detail.inputs.forEach( ( value ) => {
			if ( 'contact-plan' === value.name ) {
				planName = value.value;
			}
		} );

		if ( e.target.contains( submit ) ) {
			const container               = document.querySelector( '#awm-submit-form-container' );
			const buttonWrapper           = document.createElement( 'div' );
			buttonWrapper.id              = 'paypal-button-container';
			buttonWrapper.style.marginTop = '20px';
			container.appendChild( buttonWrapper );

			const script  = document.createElement( 'script' );
			script.src    = awmOptions.paypal_sdk_url;
			script.onload = function() {
				fetchPlanPrice( planName ).then( ( price ) => {
					paypal.Buttons( {
						createOrder( data, actions ) {
							return actions.order.create( {
								purchase_units: [
									{
										amount: {
											value: price,
										},
										description: planName,
									},
								],
							} );
						},
						onApprove( data, actions ) {
							return actions.order.capture().then( function( details ) {
								alert( 'Payment completed by ' + details.payer.name.given_name );
								console.log( details );
								window.location.href = awmOptions.thank_you_url;
							} );
						},
						onError( err ) {
							console.error( err );
							alert( 'Payment failed. Please try again.' );
						},
					} ).render( '#paypal-button-container' );
				} );
			};
			document.body.appendChild( script );
		}
	}, false );
} );

document.addEventListener( 'DOMContentLoaded', function() {
	const token           = awmOptions.ipinfoToken;
	const pricingElements = document.querySelectorAll( '.pricing-card__price' );
	const callToAction    = document.querySelectorAll( '.call-to-action-v2__inner_content--subtitle' );

	const updatePricingCard = ( userCountry = 'US' ) => {
		if ( pricingElements.length ) {
			pricingElements.forEach( ( pricingElement ) => {
				const priceElement    = pricingElement.querySelector( '.pricing-card__price_numbers' );
				const priceDelElement = pricingElement.querySelector( '.pricing-card__price_del' );

				const pricingData    = JSON.parse( priceElement.getAttribute( 'data-pricing' ) );
				const pricingDataDel = JSON.parse( priceDelElement.getAttribute( 'data-pricing-del' ) );

				if ( 'IN' === userCountry ) {
					const priceTextElement = pricingElement.querySelector( '.pricing-card__price_number-text .gst' );

					priceElement.innerHTML         = pricingData.IN;
					priceDelElement.innerHTML      = pricingDataDel.IN;
					priceTextElement.style.display = 'block';
				} else {
					priceElement.innerHTML    = pricingData.US;
					priceDelElement.innerHTML = pricingDataDel.US;
				}
			} );
		}
	};

	const updateCallToActionPricing = ( userCountry = 'US' ) => {
		if ( callToAction.length ) {
			callToAction.forEach( ( element ) => {
				const pricingData = JSON.parse( element.getAttribute( 'data-pricing' ) );

				if ( pricingData ) {
					const priceTextElement = element.querySelector( 'p' );
					if ( 'IN' === userCountry ) {
						priceTextElement.innerHTML = pricingData.IN;
					} else {
						priceTextElement.innerHTML = pricingData.US;
					}
				}
			} );
		}
	};

	if ( ! token ) {
		updatePricingCard();
		return;
	}
	// Fetch the user's location using the ipinfo.io API
	fetch( `https://ipinfo.io/?token=${ token }` )
		.then( ( response ) => response.json() )
		.then( ( data ) => {
			updatePricingCard( data.country );
			updateCallToActionPricing( data.country );
		} )
		.catch( ( error ) => {
			console.error( 'Error fetching IP information:', error );
		} );
} );

// contact hidden plan field relative code
document.addEventListener( 'DOMContentLoaded', function() {
	const planInput = document.querySelector( 'input.wpcf7-form-control[name="plan"]' );

	// Check if the hidden input exists before proceeding
	if ( ! planInput ) {
		return;
	}

	const getStartBtns = document.querySelectorAll( '.our-pricing__inner_column--btn.description-secondary' );

	if ( getStartBtns.length ) {
		getStartBtns.forEach( ( button ) => {
			button.addEventListener( 'click', function() {
				const pricingColumn = button.closest( '.our-pricing__inner_column' );

				const planName = pricingColumn.querySelector( '.description-primary' );

				if ( planName ) {
					planInput.value = planName.textContent;
				}
			} );
		} );
	}
} );

/**
 * Our Pricing Section.
 * This JavaScript code is executed when the DOM is fully loaded. It handles two "Show More" button functionalities.
 */
document.addEventListener( 'DOMContentLoaded', function() {
	const hiddenItems              = document.querySelectorAll( '.our-pricing__inner .row .col-xl-4' );
	const showMoreButton           = document.querySelector( '#show-more-button' );
	const showMorebuttonResponsive = document.querySelectorAll( '.show-more-button-responsive' );

	// Function for removing the 'remove-bottom-radius' class from the child element
	function removeBottomRadius( parentItem ) {
		// Find the child element with the class 'our-pricing__inner_column'
		const childElement = parentItem.querySelector( '.our-pricing__inner_column' );

		// If it has the class 'remove-bottom-radius', remove it
		if ( childElement && childElement.classList.contains( 'remove-bottom-radius' ) ) {
			childElement.classList.remove( 'remove-bottom-radius' );
		}
	}
	// Function to check screen width and add/remove the class 'remove-bottom-radius'
	function handleResponsiveClass() {
		const screenWidth = window.innerWidth;

		hiddenItems.forEach( function( item ) {
			const pricingColumn = item.querySelector( '.our-pricing__inner_column' );
			if ( 1199 < screenWidth ) {
				pricingColumn.classList.add( 'remove-bottom-radius' );
			} else {
				pricingColumn.classList.remove( 'remove-bottom-radius' );
			}
		} );
	}
	handleResponsiveClass();
	window.addEventListener( 'resize', handleResponsiveClass );
	if ( showMoreButton ) {
		showMoreButton.addEventListener( 'click', function( e ) {
			e.preventDefault();

			hiddenItems.forEach( function( item ) {
				item.classList.add( 'show' );
				removeBottomRadius( item );
			} );

			showMoreButton.parentElement.remove();
		} );
	}
	if ( 0 < showMorebuttonResponsive.length ) {
		showMorebuttonResponsive.forEach( function( button ) {
			button.addEventListener( 'click', function( e ) {
				e.preventDefault();

				const parentItem = button.closest( '.col-xl-4' );

				if ( parentItem ) {
					parentItem.classList.add( 'show' );
				}

				button.parentElement.remove();
			} );
		} );
	}
} );

// popup code
document.addEventListener( 'DOMContentLoaded', function() {
	const delay = awmOptions.awmpopup;
	const popup = document.getElementById( 'popup' );
	// Function to set a cookie
	function setCookie( name, value, days ) {
		const date = new Date();
		date.setTime( date.getTime() + ( days * 24 * 60 * 60 * 1000 ) );
		const expires   = 'expires=' + date.toUTCString();
		document.cookie = name + '=' + value + ';' + expires + ';path=/';
	}
	// Function to get a cookie by name
	function getCookie( name ) {
		const cookieArr = document.cookie.split( ';' );
		for ( let i = 0; i < cookieArr.length; i++ ) {
			const cookie = cookieArr[ i ].trim();
			if ( 0 === cookie.indexOf( name + '=' ) ) {
				return cookie.substring( name.length + 1 );
			}
		}
		return null;
	}
	// Check if popup should be shown based on the cookie
	function checkPopup() {
		const popupCookie = getCookie( 'popup_shown' );
		if ( ! popupCookie && popup ) {
			const popupInner = popup.querySelector( '.popup__inner' );
			const close      = popup.querySelector( '#popup-close' );
			setTimeout( () => {
				popup.style.display = 'block';
				close.addEventListener( 'click', function() {
					popup.style.display = 'none';
				} );
				document.addEventListener( 'click', function( e ) {
					if ( ! popupInner.contains( e.target ) ) {
						popup.style.display = 'none';
					}
				} );
				setCookie( 'popup_shown', 'yes', 2 );
			}, delay );
		}
	}
	checkPopup();
} );

/**
 * Adds 'sticky' class to header.
 */
let lastScrollTop = 0;
const header      = document.querySelector( '.header' );

window.addEventListener( 'scroll', function() {
	const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

	if ( 0 < scrollTop ) {
		if ( scrollTop > lastScrollTop ) {
			if ( 103 < scrollTop ) {
				header.classList.add( 'hide' );
			}
			header.classList.remove( 'sticky' );
		} else {
			header.classList.add( 'sticky' );
			header.classList.remove( 'hide' );
		}
	} else {
		header.classList.remove( 'sticky', 'hide' );
	}

	lastScrollTop = scrollTop;
} );

/**
 * Adjusts ".sidebar-call-to-action" margin-top to 45px on scroll ≥ 250px if viewport ≥ 991px, else 0px.
 */
document.addEventListener( 'DOMContentLoaded', () => {
	const sidebar = document.querySelector( '.sidebar-call-to-action' );
	if ( sidebar ) {
		const updateMargin = () => {
			const viewportWidth  = window.innerWidth;
			const scrollPosition = window.scrollY || document.documentElement.scrollTop;
			if ( 991 > viewportWidth ) {
				sidebar.style.marginTop = '0px';
			} else {
				sidebar.style.marginTop = ( 250 <= scrollPosition ) ? '45px' : '0px';
			}
		};
		window.addEventListener( 'scroll', updateMargin );
		window.addEventListener( 'resize', updateMargin );
	}
} );

/**
 * Our Pricing Section
 * Smoothly show the services and hide the details button
 */
document.addEventListener( 'DOMContentLoaded', function() {
	const detailsBtns   = document.querySelectorAll( '.pricing-card__details-btn' );
	const servicesLists = document.querySelectorAll( '.pricing-card__services' );

	detailsBtns.forEach( ( detailsBtn, index ) => {
		const servicesList = servicesLists[ index ];

		if ( detailsBtn && servicesList ) {
			detailsBtn.addEventListener( 'click', function() {
				servicesList.style.display   = 'flex';
				servicesList.style.maxHeight = servicesList.scrollHeight + 'px';
				servicesList.style.overflow  = 'unset';

				detailsBtn.style.display = 'none';
			} );
		}
	} );
} );

/*
 * This script manages the display of categories within a list.
 */
const INITIAL_DISPLAY_LIMIT = 4;
const allCategoryItems      = document.querySelectorAll( '#category-list li' );
const toggleButton          = document.getElementById( 'toggle-categories' );

// Function to initialize the category display, showing only the first few items
function awminitCategoryDisplay() {
	allCategoryItems.forEach( ( item, index ) => {
		if ( index > INITIAL_DISPLAY_LIMIT && ! item.classList.contains( 'category-home' ) ) {
			item.classList.add( 'awm-category-hidden' );
		}
	} );
}

// Function to toggle the visibility of additional categories
function awmtoggleCategories() {
	const hiddenCategoryItems = document.querySelectorAll( '#category-list .awm-category-hidden' );

	if ( 0 < hiddenCategoryItems.length ) {
		hiddenCategoryItems.forEach( ( item ) => {
			item.classList.remove( 'awm-category-hidden' );
		} );
		toggleButton.textContent = 'Show Less';
	} else {
		allCategoryItems.forEach( ( item, index ) => {
			if ( index > INITIAL_DISPLAY_LIMIT && ! item.classList.contains( 'category-home' ) ) {
				item.classList.add( 'awm-category-hidden' );
			}
		} );
		toggleButton.textContent = 'Show More';
	}
}

// Add click event listener to the toggle button
toggleButton?.addEventListener( 'click', () => {
	awmtoggleCategories();
} );

// Initialize the category display when the DOM is fully loaded
document.addEventListener( 'DOMContentLoaded', () => {
	awminitCategoryDisplay();
} );

/**
 * Our Pricing Section
 * Get the URL parameters Sign Up Form
 */
document.addEventListener( 'DOMContentLoaded', function() {
	function awmGetQueryParam( param ) {
		const urlParams = new URLSearchParams( window.location.search );
		return urlParams.get( param );
	}
	const selectedPlan = awmGetQueryParam( 'plan' );
	if ( selectedPlan ) {
		const selectField = document.querySelector( '#contact-plan' );
		selectField.value = selectedPlan;
	}
	const urlParams = new URLSearchParams( window.location.search );
	const plan      = urlParams.get( 'plan' );
	if ( plan ) {
		const decodedPlan = decodeURIComponent( plan.replace( /\+/g, ' ' ) );
		const planSelect  = document.getElementById( 'contact-plan' );
		for ( let i = 0; i < planSelect.options.length; i++ ) {
			if ( planSelect.options[ i ].text === decodedPlan ) {
				planSelect.selectedIndex = i;
				break;
			}
		}
	}
} );

//This code is used for rankmath-breadcrumbs. This code remove breadcrumbs default seprator text.
const elements = document.getElementsByClassName( 'separator' );
for ( let i = 0; i < elements.length; i++ ) {
	elements[ i ].innerHTML = '';
}
