
package twitter;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

public class UserModel {
    
    public static boolean login(User user ){
        try{
            Connection connection = DatabaseConnection.getConnection();
            
            String query = "select id, username, password from user "
                    + " where username = ? ";
            
            PreparedStatement statement = connection.prepareStatement(query);
            
            // indexing starts with 1, why? it's ok to cry
            statement.setString(1, user.getUsername());
            
            ResultSet results = statement.executeQuery();
            
            String password = "";
            if ( results.next() ){
                password = results.getString("password");
            } 
            
            results.close();
            statement.close();
            connection.close();
            
            return !password.isEmpty() && user.getPassword().equals(password);
            
        }
        catch ( Exception ex ){
            System.out.println(ex);
            return false;
        }
    }
    
    public static User getUser(String username){
        User user = null;
        try{
            
            Connection connection = DatabaseConnection.getConnection();
            
             String query = "select id, username, password, filename from user "
                    + " where username = ? ";
            
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1, username);
            
            ResultSet results = statement.executeQuery();
            
            while ( results.next() ){
                int id = results.getInt("id");
                String password = results.getString("password");
                String filename = results.getString("filename");
                
                user = new User(id, username, password, filename);
                
            }
            
            results.close();
            statement.close();
            connection.close();

        }
        catch ( Exception ex ){
            System.out.println(ex);
        }
        
        return user;
    }
    
    public static ArrayList<User> getUsers(){
        ArrayList<User> users = new ArrayList<>();
        try{
            Connection connection = DatabaseConnection.getConnection();
            
            Statement statement = connection.createStatement();
            
            ResultSet results = statement.executeQuery("select * from user");
            
            while ( results.next() ){
                int id = results.getInt("id");
                String username = results.getString("username");
                String password = results.getString("password");
                String filename = results.getString("filename");
                
                User user = new User(id, username, password, filename);
                
                users.add(user);
            }
            
            results.close();
            statement.close();
            connection.close();
            
        }
        catch ( Exception ex ){
            System.out.println(ex);
        }
        
        return users;
        
    }
    
    public static void addUser(User user){
        try{
            Connection connection = DatabaseConnection.getConnection();
            
            String query = "insert into user ( username, password ) "
                    + " values ( ?, ? )";
            
            PreparedStatement statement = connection.prepareStatement(query);
            
            // indexing starts with 1, why? it's ok to cry
            statement.setString(1, user.getUsername());
            statement.setString(2, user.getPassword());
            
            statement.execute();
            
            statement.close();
            connection.close();
            
        }
        catch ( Exception ex ){
            System.out.println(ex);
        }
    }
    
    public static void updateUser(User user){
        try{
            Connection connection = DatabaseConnection.getConnection();
            
            String query = "update user set username = ? , password = ? "
                    + " where id = ? ";
            
            PreparedStatement statement = connection.prepareStatement(query);
            
            // indexing starts with 1, why? it's ok to cry
            statement.setString(1, user.getUsername());
            statement.setString(2, user.getPassword());
            statement.setInt(3, user.getId());
            
            statement.execute();
            
            statement.close();
            connection.close();
            
        }
        catch ( Exception ex ){
            System.out.println(ex);
        }
    }
    
    public static void deleteUser(User user){
        try{
            Connection connection = DatabaseConnection.getConnection();
            
            String query = "delete from user where id = ? ";
            
            PreparedStatement statement = connection.prepareStatement(query);
            
            // indexing starts with 1, why? it's ok to cry
            statement.setInt(1, user.getId());
            
            statement.execute();
            
            statement.close();
            connection.close();
            
        }
        catch ( Exception ex ){
            System.out.println(ex);
        }
    }
}
