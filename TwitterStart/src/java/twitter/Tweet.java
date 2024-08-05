
package twitter;

import java.sql.Timestamp;

public class Tweet {
    private int id;
    private String text;
    private Timestamp timestamp;
    private int user_id;

    public Tweet(int id, String text, Timestamp timestamp, int user_id) {
        this.id = id;
        this.text = text;
        this.timestamp = timestamp;
        this.user_id = user_id;
    }
    
    

    public int getId() {
        return id;
    }

    public String getText() {
        return text;
    }

    public Timestamp getTimestamp() {
        return timestamp;
    }

    public int getUser_id() {
        return user_id;
    }
    
    
}
