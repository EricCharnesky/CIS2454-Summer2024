
package stocks;

import java.io.Serializable;
import java.util.ArrayList;


public class Portfolio implements  Serializable {
    private ArrayList<Stock> stocks;

    public Portfolio() {
        this(new ArrayList<Stock>() );
    }

    public Portfolio(ArrayList<Stock> stocks) {
        this.stocks = stocks;
    }
    
    public double getTotalValue(){
        double value = 0;
        
        for ( Stock stock : stocks ){
            value += stock.getValue();
        }
        return value;
    }
    
    public void addStock(Stock stock){
        stocks.add(stock);
    }

    public ArrayList<Stock> getStocks() {
        return stocks;
    }

    public void setStocks(ArrayList<Stock> stocks) {
        this.stocks = stocks;
    }
    
    
    
}
