
package twitter;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {
     public static Connection getConnection() throws SQLException, ClassNotFoundException {
        // force java to load the driver
        Class.forName("com.mysql.jdbc.Driver");
        // driver: // url:port / database
        String dbURL = "jdbc:mysql://localhost:3306/twitter-winter2022";
        // this is bad form - but we don't have better ways right now
        String username = "twitter-winter2022";
        String password = "test";
        Connection connection = DriverManager.getConnection(
                dbURL, username, password);
        return connection;
    }
}
