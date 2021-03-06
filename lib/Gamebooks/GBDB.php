<?php
/**
  *
  * Copyright (c) Demian Katz 2009.
  *
  * This program is free software; you can redistribute it and/or modify
  * it under the terms of the GNU General Public License version 2,
  * as published by the Free Software Foundation.
  *
  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.
  *
  * You should have received a copy of the GNU General Public License
  * along with this program; if not, write to the Free Software
  * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
  *
  */
require_once 'Gamebooks/config.php';

/**
 * Gamebook Database Class
 *
 * This class provides a simple wrapper around PHP's MySQL functionality for
 * convenient database access.
 *
 * @author      Demian Katz
 * @access      public
 */
class GBDB
{
    private static $dbLink = false;
    
    /**
     * Constructor
     *
     * @access  public
     */
    public function __construct()
    {
        $this->open();
    }
    
    /** Open a database connection if one does not already exist.
     *
     * @access  public
     */
    public function open()
    {
        if (!self::$dbLink) {
            self::$dbLink = mysql_connect(GAMEBOOKS_DB_HOST, GAMEBOOKS_DB_USER,
                GAMEBOOKS_DB_PASS) or die ("Unable to connect to database");
            mysql_select_db(GAMEBOOKS_DB_NAME, self::$dbLink)
                or die("Could not select database");
            $this->query("SET NAMES utf8");
        }
    }
    
    /** Close a database connection if one is already open.
     *
     * @access  public
     */
    public function close()
    {
        if (self::$dbLink) {
            mysql_close(self::$dbLink);
            self::$dbLink = false;
        }
    }
    
    /** Make a string safe for inclusion in a database query.
     *
     * @access  public
     * @param   string  $str            Unsafe string.
     * @return  string                  Escaped, database-safe string.
     */
    public function escape($str)
    {
        return mysql_real_escape_string($str, self::$dbLink);
    }
    
    /** Given a resource handle, fetch an associative array of results.
     *
     * @access  public
     * @param   string  $handle         Resource handle from query method.
     * @return  mixed                   Boolean false if no data to fetch,
     *                                  associative array otherwise.
     */
    public function fetchAssoc($handle)
    {
        return mysql_fetch_assoc($handle);
    }
    
    /** Close a database connection if one is already open.
     *
     * @access  public
     * @param   string  $sql            SQL query to execute.
     * @return  mixed                   Boolean false on error, boolean true or
     *                                  database resource handle on success.
     */
    public function query($sql)
    {
        return mysql_query($sql, self::$dbLink);
    }
    
    /** Get the ID value generated by the previous INSERT operation.
     *
     * @access  public
     */
    public function getNewID()
    {
        return mysql_insert_id(self::$dbLink);
    }
}

?>