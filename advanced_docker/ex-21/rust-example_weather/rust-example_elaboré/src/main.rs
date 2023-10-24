use reqwest;
use serde_derive::Deserialize;
use std::env;

#[derive(Deserialize)]
struct CurrentUnits {
    temperature_2m: String,
    relativehumidity_2m: String,
}

#[derive(Deserialize)]
struct Current {
    temperature_2m: f32,
    relativehumidity_2m: i32,
}

#[derive(Deserialize)]
struct WeatherResponse {
    current_units: CurrentUnits,
    current: Current,
}

#[tokio::main]
async fn main() -> Result<(), reqwest::Error> {
    let args: Vec<String> = env::args().collect();

    if args.len() != 4 {
        eprintln!("Utilisation : {} <nomVille> <latitude> <longitude>", args[0]);
        std::process::exit(1);
    }

    let city_name = &args[1];
    let latitude = &args[2];
    let longitude = &args[3];

    let url = format!(
        "https://api.open-meteo.com/v1/forecast?latitude={}&longitude={}&current=temperature_2m,relativehumidity_2m",
        latitude,
        longitude
    );

    let response = reqwest::get(&url).await?;

    if response.status() != reqwest::StatusCode::OK {
        eprintln!("Erreur : Impossible de trouver la ville spécifiée.");
        std::process::exit(1);
    }


    if response.status() == reqwest::StatusCode::OK {
        let weather_response: WeatherResponse = serde_json::from_str(&*response.text().await?).unwrap();
        println!("Météo à {} :", city_name);
        println!("Temperature: {}{}", weather_response.current.temperature_2m, weather_response.current_units.temperature_2m);
        println!("Humidité: {}{}", weather_response.current.relativehumidity_2m, weather_response.current_units.relativehumidity_2m);
    } else {
        eprintln!(
            "Erreur : Impossible de récupérer les données météorologiques pour la ville spécifiée."
        );
        std::process::exit(1);
    }

    Ok(())
}
