/**
 * Script for the river crossing puzzle.
 */
 
 "use strict";
 
 /**
  * Function to run once window loads.
  */
  window.onload = function() {
  	
  	// variables with data to be passed to controller
  	var start_time = "";
  	var end_time = "";
  	var moves = 0; 
  	
   /**
  	* Send AJAX data via POST with start time, end time, and number of moves. 
  	*/
  	function sendData(start, end, move_num) {
		// CSRF protection
		$.ajaxSetup(
		{
		    headers:
		    {
		        'X-CSRF-Token': $('input[name="_token"]').val()
		    }
		});
		  	
		$.ajax({                    
			url: '/the-endangered-miners',     
			type: 'post', // performing a POST request
			data : {"start_time":start,"end_time":end,"moves":move_num,"title":"The Endangered Miners"},
			dataType: JSON,                 
	    });
	}
	
	// miner constructor
	function Miner(charName, minutes) {
		this.charName = charName;
		this.minutes = minutes;
		this.imgPath = "images/miners/" + charName.toLowerCase() + ".png";
		this.onLeft = true;
		this.onRaft = false; 
	}
  
  // minutes miners have spent in cave
  var minerTime = 0; 
  
  // raft initial values
  var raftOnLeft = true; 
  var xPos;
  var bankDistance = 200;
  var raftMoving = false;
  
  // store important objects
  var aChar, bChar, cChar, dChar;
  var aPassenger = null;
  var bPassenger = null;
  
  // text divs
  var playerMsg = document.getElementById("playerMsg");
  var endText = document.getElementById("endText");
  var stepsArea = document.getElementById("steps");
  
  // game not playable until "start button pressed"
  var gamePlayable = false;
 
  // start button not pressed yet
  var startPressed = false;
  
  /**
   * Start button listens for click events.
   */
  document.getElementById("startBtn").addEventListener("click", function(e) {
  	
  	// if raft moving, signal that start button pressed
  	if (raftMoving) {
  		startPressed = true;
  	}
  	
  	// set start time
  	start_time = new Date().toJSON();
  	
  	// reset game 
  	gamePlayable = true;
  	aPassenger = null;
  	bPassenger = null;
  	minerTime = 0;
  	xPos = 10;
  	playerMsg.innerHTML = "Minutes spent in cavern: 0 minutes";
  	endText.innerHTML = "";
  	stepsArea.innerHTML = "";
  	
  	// reset raft 
  	document.getElementById("raft").style.left = 0;
  	raftOnLeft = true;
  	
  	// create miner objects
  	aChar = new Miner("Onika", 1);
  	bChar = new Miner("Twitch", 2);
  	cChar = new Miner("Fiona", 4);
  	dChar = new Miner("Edward", 8);
  	
  	// create farmer object
  	//farmer = new Farmer(document.querySelector('input[name="gender"]:checked').value);
  	
  	// draw farmer on left bank
  	//document.getElementById("farmerLeft").appendChild(document.getElementById("farmerImg"));
  	//farmerImg.src = farmer.imgPath;
  	
	// store chosen theme details
  	/*var select = document.getElementById("select");
  	var themeNum = select.selectedIndex;
  	var theme = select.options[select.selectedIndex].value.split("/");
  	
  	// create character objects
  	aChar = new Character(theme[0], 1, themeNum); 
  	bChar = new Character(theme[1], 2, themeNum); 
  	cChar = new Character(theme[2], 3, themeNum);*/ 
  	
  	// store image elements
  	var aImg = document.getElementById("aImg");
  	var bImg = document.getElementById("bImg");
  	var cImg = document.getElementById("cImg");
  	var dImg = document.getElementById("dImg");
  	
  	// put character image elements on left bank
  	document.getElementById("aLeft").appendChild(aImg);
  	document.getElementById("bLeft").appendChild(bImg);
  	document.getElementById("cLeft").appendChild(cImg);
  	document.getElementById("dLeft").appendChild(dImg);
  	
	// set image sources, so images visible
	aImg.src = aChar.imgPath;
	bImg.src = bChar.imgPath;
	cImg.src = cChar.imgPath;
	dImg.src = dChar.imgPath;
  });
	  
  /**
   * Canvas element listens for click events.
   */
	document.getElementById("canvas").addEventListener("click", function(e) {
		
		// if game has been (re)started and raft not moving
		if (gamePlayable && !raftMoving) {
  		
  			// if farmer image clicked
  			/*if (e.target == document.getElementById("farmerImg")) {
  			
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
  			// if miner clicked
   		} else*/ if (e.target == document.getElementById("aImg") || 
   					  e.target == document.getElementById("bImg") || 
   					  e.target == document.getElementById("cImg") ||
   					  e.target == document.getElementById("dImg")) {
   		
   			// save information about target
   			var currentChar;
   			var idChar = e.target.getAttribute("id").charAt(0);
   			
   			// store correct character clicked
   			if (idChar == "a") {
   				currentChar = aChar;
   			} else if (idChar == "b") {
   				currentChar = bChar;
   			} else if (idChar == "c") {
   				currentChar = cChar;
   			} else {
   				currentChar = dChar;
   			}
   		
   			// access a and b spots on raft
   			var aSpot = document.getElementById("aSpot");
   			var bSpot = document.getElementById("bSpot");
   		
			// if raft on left, character on left, character on bank
   			if (raftOnLeft && currentChar.onLeft && !currentChar.onRaft) { 
   			
   				// if no miner on aSpot
   				if (aSpot.innerHTML == "") {
   					
   					// put miner on raft on aSpot
   					aSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					aPassenger = currentChar;
   					
   				// if a miner on aSpot and no miner on bSpot
   				} else if (bSpot.innerHTML == "") {

   					// put miner on bSpot
   					bSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					bPassenger = currentChar;
   				}
   		
   				// if no passenger on raft
   				/*if (passengerSpot.innerHTML == "") {
   				
   					// put passenger on raft
   					passengerSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					raftPassenger = currentChar;
   				}*/
   			// if raft on left, character on left, character on raft
   			} else if (raftOnLeft && currentChar.onLeft && currentChar.onRaft) {
   			
   				// put character on left bank
   				document.getElementById(idChar + "Left").appendChild(e.target);
   				currentChar.onRaft = false;
   				
   				// if miner removed from aSpot
   				if (aSpot.innerHTML == "") {
   					aPassenger = null;
   				}
   				
   				// if a miner removed from bSpot
   				if (bSpot.innerHTML == "") {
   					bPassenger = null;
   				}
   				//raftPassenger = null;
   			}
   			// if raft on right, character on right, character on bank
   			else if (!raftOnLeft && !currentChar.onLeft && !currentChar.onRaft) {
   				
   				// if no miner on aSpot
   				if (aSpot.innerHTML == "") {
   					
   					// put miner on raft on aSpot
   					aSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					aPassenger = currentChar;
   					
   				// if a miner on aSpot and no miner on bSpot
   				} else if (bSpot.innerHTML == "") {

   					// put miner on bSpot
   					bSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					bPassenger = currentChar;
   				}
   			
   				// if no passenger on raft
   				/*if (passengerSpot.innerHTML == "") {
   				
   					// put passenger on raft
   					passengerSpot.appendChild(e.target);
   					currentChar.onRaft = true;
   					raftPassenger = currentChar;
   				}*/
   			}
   			// if raft on right, character on right, character on raft
   			else if (!raftOnLeft && !currentChar.onLeft && currentChar.onRaft) {
   				
   				// put character on right bank
   				document.getElementById(idChar + "Right").appendChild(e.target);
   				currentChar.onRaft = false;
   				
   				// if miner removed from aSpot
   				if (aSpot.innerHTML == "") {
   					aPassenger = null;
   				}
   				
   				// if a miner removed from bSpot
   				if (bSpot.innerHTML == "") {
   					bPassenger = null;
   				}
   				
   				// check if game won
   				checkGameWon();
   			
   				// put passenger on right bank
   				/*document.getElementById(idChar + "Right").appendChild(e.target);
   				currentChar.onRaft = false;
   				raftPassenger = null;
   				checkGameWon();*/
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
   	
   	// raft can only move if game playable, raft not moving already, and at least one passenger on raft
   	if (gamePlayable && !raftMoving && (aPassenger != null || bPassenger != null)) {
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
   			moves = 0;
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
   				
   				if (aPassenger) {
   					aPassenger.onLeft = false;
  				}
  				
  				if (bPassenger) {
  					bPassenger.onLeft = false;
  				}
  				
  				raftMoving = false;
  					
  				// write results to screen
  				writeTime();
  				writeSteps();
  				checkGameLost();
  				
  				// increment moves
  				moves++;
  					
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
  				
  			    if (aPassenger) {
   					aPassenger.onLeft = true;
  				}
  				
  				if (bPassenger) {
  					bPassenger.onLeft = true;
  				}
  				
  				raftMoving = false;
  					
  				// write results to screen
  				writeTime();
  				writeSteps();
  				checkGameLost();
  				
  				// increment moves
  				moves++;
  					
  				// stop moving
  				return;
   			}
   				setTimeout(move, 25);
   		}
   	}
   });
   
   /**
    * Checks if the condition is met for puzzle to be solved
    * (all characters on right side in 15 or less minutes), and writes text to screen if won.  
    */
    function checkGameWon() {
    	
    	// if all characters on right side and not on raft
    	if (!aChar.onLeft && !bChar.onLeft && !cChar.onLeft && !dChar.onLeft &&
    		!aChar.onRaft && !bChar.onRaft && !cChar.onRaft && !bChar.onRaft) {
    			
    			// if game is not lost
    			if (minerTime <= 15) {    				
    				
    				// add background to endText div
   	   				endText.style.backgroundColor = "#54585C";
   	   		
   	   				// print message
	   				endText.innerHTML = "You solved the puzzle; the miners escaped safely!";
	   		
	   				// end game
   					gamePlayable = false;
   					
   					// save puzzle end time
		   			end_time = new Date().toJSON();
		   			
		   			// send data via AJAX
		   			sendData(start_time, end_time, moves);
    			}
    	}
    }
    
   /**
    * Write updated time at top of game.
    */
    function writeTime() {
    	
    	var aTime = 0; 
    	var bTime = 0;
    	var slowTime = 0;
    	
    	// get first passenger's time
    	if (aPassenger) {
    		aTime = aPassenger.minutes;
    	}
    	
    	// get second passenger's time
    	if (bPassenger) {
    		bTime = bPassenger.minutes;
    	}
    	
    	// get the slowest time
    	slowTime = ((aTime >= bTime) ? aTime : bTime); 
    	
    	// write time info to screen
    	playerMsg.innerHTML = "Minutes spent in cavern: " + minerTime + " + " + slowTime + " = " + (minerTime + slowTime) + " minutes";
    	
    	// reset miner time 
    	minerTime += slowTime;
    }
   
   /**
    * Checks if any conditions are met for the game to end because player lost
    * (time ran out), and writes text to screen if lost.
    */
   function checkGameLost() {
   	
	   // if time has run out
	   if (minerTime > 15) {
	   		// add background to endText div
   	   		endText.style.backgroundColor = "#54585C";
   	   		
   	   		// print message
	   		endText.innerHTML ="The miners did not escape in 15 minutes or less; the mine has collapsed!";
	   		
	   		// end game
   			gamePlayable = false;
	   }
   }
   
   /**
    * Writes the step just taken to the document.
    */
    function writeSteps() {

    	var stepText = "";
    	
    	// if passenger in aSpot
    	if (aPassenger) {
    		
    		// if on left side
    		if (aPassenger.onLeft) {
    			
    			stepText = aPassenger.charName + ((bPassenger) ? " & " + bPassenger.charName + " return" : " returns"); 
    			
    		// if on right side
    		} else {
    			stepText = aPassenger.charName + ((bPassenger) ? " & " + bPassenger.charName + " cross" : " crosses"); 
    		}
    	
    	// passenger in bSpot, but not aSpot
    	} else {
    		
    		// if on left side
    		if (bPassenger.onLeft) {
    			stepText = bPassenger.charName + " returns";
    			
    		// if on right side
    		} else {
    			stepText = bPassenger.charName + " crosses";
    		}
    	}
    	
    	// add list item with text to document
    	var liNode = document.createElement("li");
    	var textNode = document.createTextNode(stepText);
    	liNode.appendChild(textNode);
    	stepsArea.appendChild(liNode);
    }
}