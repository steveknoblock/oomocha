<?php

/**
 * Overview: This file is an example of building a class
 * providing an object-oriented representation of a
 * relational database table.
 * 
 */

/* Example includes for configuration and database connection
 * startup. You would need to provide these on your own.
 */
//require_once BASE_DIR . 'includes/config.php';
//require_once BASE_DIR . 'includes/db.php';

/* A simple model of a database table for
 * information about movies.
 */

// films
// --------
// film_id
// title
// copyright
// duration
// format_id
// description



class FilmModel {

	public $film_id;
	public $title;
	public $copyright;
	public $duration;
	public $format_id;
	public $description;	

	public function create() {

		$sql = "INSERT " . FILM_INFO_TABLE ." SET ";

		$sql .= sprintf( "title='%s', copyright='%s', duration='%s', format_id='%s', 
			description='%s' WHERE filmid = %s",
				$this->title,
				$this->copyright,				
				$this->duration,
				$this->format_id,
				$this->description,
			);
	}

	public function update() {

		$sql = "UPDATE " . FILM_INFO_TABLE ." SET ";

		$sql .= sprintf( "title='%s', copyright='%s', duration='%s', format_id='%s', 
			description='%s' WHERE filmid = %s",
				$this->title,
				$this->copyright,				
				$this->duration,
				$this->format_id,
				$this->description,
			);
			//var_dump($sql);
	}


	public function load($id) {
		global $db;
		$sql = "SELECT filmid, title, altitle, sortitle, producer, photographer, editor, sound, acknowledge,
		 othercredits, othercreditsmore, copyrightdate, releasedate, sourcetitle, sourceid, sourceidtype, series, duration,
		  funding, awards, color, origformatid, fullstream, keywords, shortdescribe, longdescribe, reviewblurb, reviewsource,
		   regionid, language, otherlang, dialect, copystate, outloc, outdescribe, featured_blurb, youtubesrc, youtubeloc
		FROM ". FILM_INFO_TABLE ." f
		WHERE f.filmid = {$id}";
		//$msg = "Error: " . __FILE__ . __LINE__;
		//DB_FETCHMODE_OBJECT
		$db->setFetchMode( DB_FETCHMODE_ASSOC );
	    $res =& $db->query($sql);
	    if ( DB::isError( $res ) ) {
	        die( "Error: ". $res->getMessage() );
	    }
		if( $res->numRows() <> 1 ) {
			die("<p>Film not found</p>");
		}

    	$this->data =& $res->fetchRow();

		$format = $this->originalFormat($this->data['origformatid']);
	
		$region = $this->region($this->data['regionid']);

		// Set Film properties
		foreach ($this->data as $property=>$value) {
			$this->$property = $value;
		}

	}


	/*
	 * Related table
	 * format
	 */

	protected function originalFormat($id) { 
		global $db_name;
		return "DUMMY";
		$sql = "
		SELECT origformatid, origformat
			FROM ". ORIGINAL_FORMAT_TABLE ." WHERE origformatid = ". $id;


		$db->setFetchMode( DB_FETCHMODE_ASSOC );
	    $res =& $db->query($sql);
	    if ( DB::sError( $res ) ) {
	        die( "Error: ". $res->getMessage() );
	    }
		if( $res->numRows() <> 1 ) {
		die("<p>Film not found</p>");
		}
    	$this->data_format =& $res->fetchRow();

		
		/*
		$result = mysql_db_query($db_name, $sql);
		if (!$result) {
			print "Error: ". mysql_error();
		}
		//var_dump($result);
		*/
		/*
		$this->data_format = mysql_fetch_array($result, MYSQL_ASSOC);
		//var_dump($this->data_format);
		*/

		return $this->data_format;
	}


	/*
	 * Related table
	 * region
	 */

	protected function region($id) {
		global $db_name;
		$sql = "
		SELECT regionid, region
			FROM ". REGION_TABLE ." WHERE regionid = ". $id;
		$result = mysql_db_query($db_name, $sql);
		if (!$result) {
			print "Error: ". mysql_error();
		}
		$this->data_region = mysql_fetch_array($result, MYSQL_ASSOC);
		//var_dump($this->data_region);
		return $this->data_region;	
	}





	// prepare for insert or update

	protected function prepare() {
		$sql .= sprintf( 
			"title='%s'",
			"copyright='%s'", 
			"duration='%s'",
			"format_id='%s'",
			"description='%s'",



			youtubeloc='%s' WHERE filmid = %s",
				$this->title,
				$this->copyright,
				$this->duration,
				$this->format_id,
				$this->description,
				$this->film_id
			);
	}

} // end class
