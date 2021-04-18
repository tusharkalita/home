  function new_user() {
                $cekIP = "SELECT ip FROM useronline WHERE ip='$this->ip'";
                $resultCekIp=mysql_query($cekIP);
                $countCekIp=mysql_num_rows($resultCekIp);
                if($countCekIp>0){
                    $insert1 = mysql_query ("UPDATE useronline SET timestamp='$this->timestamp', date=NOW(), ip='', distinct_ip='$this->ip'");
                    if (!$insert1) {
                        $this->error[$this->i] = "Unable to record new visitor\r\n";            
                        $this->i ++;
                        }
                    }
                else{
                    $insert2 = mysql_query ("INSERT INTO useronline (timestamp, date, ip, distinct_ip) VALUES ('$this->timestamp',NOW(), '$this->ip', '$this->ip')");
                    if (!$insert2) {
                        $this->error[$this->i] = "Unable to record new visitor\r\n";            
                        $this->i ++;
                        }
                    }
                }
            function delete_user() {
                $delete = mysql_query ("DELETE FROM useronline WHERE timestamp < ($this->timestamp - $this->timeout)");
                if (!$delete) {
                    $this->error[$this->i] = "Unable to delete visitors";
                    $this->i ++;
                    }
                }
            function count_users() {
                if (count($this->error) == 0) {
                    $count = mysql_num_rows ( mysql_query("SELECT DISTINCT ip FROM useronline"));
                    return $count;
                    }
                }
            }
        ?>
