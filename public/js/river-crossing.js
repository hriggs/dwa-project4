/**
 * Script for the river crossing puzzle.
 */
 
 "use strict";
 
 /**
  * Function to run once window loads.
  */
  window.onload = function() {
  	
  	// Creating and handling a data structure (JSON, custom objects, etc): 
  	// farmer constructor
  	function Farmer(gender) {
		this.imgPath = "images/" + ((gender == "female") ? "girlFarmer.png" : "boyFarmer.png");  	
		this.onLeft = true;
		this.onRaft = false; 
  }
    
  // passenger character constructor
  function Character(charName, number, themeNum) {
  	this.charName = charName.toLowerCase();
  	this.number = number;
  	this.imgPath = "images/theme" + themeNum + "/" + charName + ".png";
  	this.onLeft = true;
  	this.onRaft = false; 
  }
  
  // raft initial values
  var raftOnLeft = true; 
  var xPos;
  var bankDistance = 200;
  var raftMoving = false;
  
  // store important objects
  var farmer;
  var aChar, bChar, cChar;
  var raftPassenger;
  
  // text divs
  var endText = document.getElementById("endText");
  var stepsArea = document.getElementById("steps");
  
  // game not playable until "start button pressed"
  var gamePlayable = false;
 
  // start button not pressed yet
  var startPressed = false;
  
  /**
   * Start button listens for click events.
   * 
   * Capturing and handling events:
   */
  document.getElementById("startBtn").addEventListener("click", function(e) {
  	
  	// if raft moving, signal that start button pressed
  	if (raftMoving) {
  		startPressed = true;
  	}
  	
  	// reset game 
  	gamePlayable = true;
  	raftPassenger = null;
  	xPos = 10;
  	endText.innerHTML = "";
  	stepsArea.innerHTML = "";
  	
  	// reset raft 
  	document.getElementById("raft").style.left = 0;
  	raftOnLeft = true;
  	
  	// create farmer object
  	farmer = new Farmer(document.querySelector('input[name="gender"]:checked').value);
  	
  	// draw farmer on left bank
  	document.getElementById("farmerLeft").appendChild(document.getElementById("farmerImg"));
  	farmerImg.src = farmer.imgPath;
  	
	// store chosen theme details
  	var select = document.getElementById("select");
  	var themeNum = select.selectedIndex;
  	var theme = select.options[select.selectedIndex].value.split("/");
  	
  	// create character objects
  	aChar = new Character(theme[0], 1, themeNum); 
  	bChar = new Character(theme[1], 2, themeNum); 
  	cChar = new Character(theme[2], 3, themeNum); 
  	
  	// store image elements
  	var aImg = document.getElementById("aImg");
  	var bImg = document.getElementById("bImg");
  	var cImg = document.getElementById("cImg");
  	
  	// put character image elements on left bank
  	document.getElementById("aLeft").appendChild(aImg);
  	document.getElementById("bLeft").appendChild(bImg);
  	document.getElementById("cLeft").appendChild(cImg);
  	
	// set image sources, so images visible
	aImg.src = aChar.imgPath;
	bImg.src = bChar.imgPath;
	cImg.src = cChar.imgPath;
  });
	
	/**
	 * Check if either gender radio button clicked.
	 * 
	 * Form validation: 
  	 */
  	 document.forms[0].addEventListener("click", function(e) {
  	 	
  	 	// if gender selected, hide error message
  	 	if (e.target.name == "gender") {
  	 		document.getElementById("genderError").style.display = "none";
  	 	}
  	 });
	  
  /**
   * Canvas element listens for click events.
   * 
   * Capturing and handling events:
   * DOM element creation, deletion or modification: 
   */
	document.getElementById("canvas").addEventListener("click", function(e) {
		
		// if game has been (re)started and raft not moving
		if (gamePlayable && !raftMoving) {
  		
  			// if farmer image clicked
  			if (e.target == document.getElementById("farmerImg")) {
  			
  				// save farmer's spot on raft
  				var farmerSpot = document.getElementById("farmerSpot");
  			
  				// if raft on left, farmer on left, farmer on bank
  				if (raftOnLeft && farmer.onLeft && !farmer.onRaft) {
  					// put farmer on raft
  					farmerSpot.appendChild(e.target);
  					farmer.onRaft = true;
  				// if raft on left, farmer on left, farmer on raft
  				} else if (raftOnLeft && farmer.onLeft && farmer.onRaft) {
  					// put farmer on left bank
  					document.getElementById("farmerLeft").appendChild(e.target);
  					farmer.onRaft = false;
  				// if raft on right, farmer on right, farmer on bank
  				} else if (!raftOnLeft && !farmer.onLeft &&!farmer.onRaft) {
  					// put farmer on raft
  					farmerSpot.appendChild(e.target);
  					farmer.onRaft = true;
  				// if raft on right, farmer on right, farmer on raft
  				} else if (!raftOnLeft && !farmer.onLeft && farmer.onRaft) {
  					// put farmer on right bank
  					document.getElementById("farmerRight").appendChild(e.target);
  					farmer.onRaft = false;
  					checkGameWon();
  				}
  			// if one of 3 other characters clicked
   		} else if (e.target == document.getElementById("aImg") || 
   					  e.target == document.getElementById("bImg") || 
   					  e.target == document.getElementById("cImg")) {
   		
   			// save information about target
   			var currentChar;
   			var idChar = e.target.getAttribute("id").charAt(0);
   			
   			// store correct character clicked
   			if (idChar == "a") {
   				currentChar = aChar;
   			} else if (idChar == "b") {
   				currentChar = bChar;
   			} else {
   				currentChar = cChar;
   			}
   		
   			// save passenger spot on raft
   			var passengerSpot = document.getElementById("passengerSpot");
   		
				// if raft on left, character on left, character on bank
   			if (raftOnLeft && currentChar.onLeft && !currentChar.onRaft) { 
   		
   				// if no passenger on raft
   				if (passengerSpot.innerHTML == "") {
   				
   					// put passenger on raft
   					passengerSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					raftPassenger = currentChar;
   				}
   			// if raft on left, character on left, character on raft
   			} else if (raftOnLeft && currentChar.onLeft && currentChar.onRaft) {
   			
   				// put character on left bank
   				document.getElementById(idChar + "Left").appendChild(e.target);
   				currentChar.onRaft = false;
   				raftPassenger = null;
   			}
   			// if raft on right, character on right, character on bank
   			else if (!raftOnLeft && !currentChar.onLeft && !currentChar.onRaft) {
   			
   				// if no passenger on raft
   				if (passengerSpot.innerHTML == "") {
   				
   					// put passenger on raft
   					passengerSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					raftPassenger = currentChar;
   				}
   			}
   			// if raft on right, character on right, character on raft
   			else if (!raftOnLeft && !currentChar.onLeft && currentChar.onRaft) {
   			
   				// put passenger on right bank
   				document.getElementById(idChar + "Right").appendChild(e.target);
   				currentChar.onRaft = false;
   				raftPassenger = null;
   				checkGameWon();
   			}
   		}
  	 }
   }); 
  
  /**
   * Cross button listens for click events.
   */
   document.getElementById("crossBtn").addEventListener("click", function(e) {
   	
   	// store raft element
   	var raft = document.getElementById("raft");
   	
   	// store widths
   	var rWidth = raft.clientWidth;
   	var cWidth = document.getElementById("canvas").clientWidth; 
   	
   	// store speed and x-increment
   	var speed = 2;
   	var dx = speed;
   	
   	// if raft on right bank, reverse direction
		if (!raftOnLeft) {  
			dx = -dx; 
		}   	
   	
   	// raft can only move if game playable, farmer on raft and raft not moving already
   	if (gamePlayable && farmer.onRaft && !raftMoving) {
   		move();
   	}
   	
   	/**
   	 * Move raft across bank.
   	 */
   	function move() {
   		
   		// if start button pressed
   		if (startPressed) {
   			// move raft to left side and reset
   			raft.style.left = "0px";
   			raftOnLeft = true;
   			raftMoving = false;
   			startPressed = false;
   			return;
   		}
   		
   		// calculate new x position
   		xPos += dx;
   		
   		// reset left position
   		raft.style.left = xPos + "px";
   		
   		raftMoving = true;
   		
   		// if raft moving towards right
   		if (xPos <= cWidth - rWidth + bankDistance && raftOnLeft) {
   			// if raft has reached destination
   			if (xPos >= cWidth - rWidth - bankDistance) {
   				// reset object values
   				raftOnLeft = false;
   				farmer.onRaft = true;
   				farmer.onLeft = false;
   				if (raftPassenger) {
   					raftPassenger.onLeft = false;
  					}
  					raftMoving = false;
  					
  					// write results to screen
  					writeSteps();
  					checkGameLost();
  					
  					// stop moving
  					return;
   			}
   				setTimeout(move, 25);
   		// if raft moving towards left
   		} else if (raftOnLeft == false) {
   			// if raft has reached destination
   			if (xPos <= 0) {
   				// reset object values
   				raftOnLeft = true;
   				farmer.onRaft = true;
   				farmer.onLeft = true;
   				if (raftPassenger) {
   					raftPassenger.onLeft = true;
  					}
  					
  					// write results to screen
  					raftMoving = false;
  					writeSteps();
  					checkGameLost();
  					
  					// stop moving
  					return;
   			}
   				setTimeout(move, 25);
   		}
   	}
   });
   
   /**
    * Checks if the condition is met for puzzle to be solved
    * (all characters on right bank) and writes text to screen if won.  
    * 
    * DOM element creation, deletion or modification:
    */
    function checkGameWon() {
    	if (!farmer.onLeft && !aChar.onLeft && !bChar.onLeft && !cChar.onLeft &&
    		 !farmer.onRaft && !aChar.onRaft && !bChar.onRaft && !cChar.onRaft) {
    		// write "win" text to screen and stop player from playing until restarting again
    		endText.innerHTML = "You solved the puzzle!";
   			gamePlayable = false;
   		}
    }
   
   /**
    * Checks if any conditions are met for the game to end because player lost
    * (an animal eaten) and writes text to screen if lost.
    * 
    * DOM element creation, deletion or modification: 
    */
   function checkGameLost() {
   	
   	// if farmer on left
   	if (farmer.onLeft) {
   		// if a & b characters on right
   		if (!aChar.onLeft && !bChar.onLeft) {
   			endText.innerHTML = "The " + aChar.charName + " ate the " + bChar.charName + "!";
   			gamePlayable = false;
   		// if b & c characters on right
   		} else if (!bChar.onLeft && !cChar.onLeft) {
   			endText.innerHTML = "The " + bChar.charName + " ate the " + cChar.charName + "!";
   			gamePlayable = false;
   		}
   	}
   	// if farmer on right
   	else {
   		// if a & b characters on left
   		if (aChar.onLeft && bChar.onLeft) {
   			endText.innerHTML = "The " + aChar.charName + " ate the " + bChar.charName + "!";
   			gamePlayable = false;
   		// if b & c characters on left
   		} else if (bChar.onLeft && cChar.onLeft) {
   			endText.innerHTML = "The " + bChar.charName + " ate the " + cChar.charName + "!";
   			gamePlayable = false;
   		}
   	}
   }
   
   /**
    * Writes the step just taken to the document.
    * 
    * DOM element creation, deletion or modification: 
    */
    function writeSteps() {

    	var stepText = "";
    	
    	// if farmer returned from right side
    	if (farmer.onLeft) {
    		stepText = "Return" + ((raftPassenger) ? " with " + raftPassenger.charName : " alone");
    	// if passenger going to left side
    	} else {
    		stepText = ((raftPassenger) ? "Take " + raftPassenger.charName + " over": "Cross alone"); 
    	}
    	
    	// add list item with text to document
    	var liNode = document.createElement("li");
    	var textNode = document.createTextNode(stepText);
    	liNode.appendChild(textNode);
    	stepsArea.appendChild(liNode);
    }
}